const pageCheckoutOrder = {
    elements: {
        orderCode: $(".order-code"),
        info: $(".info-checkout"),
        checkoutTable: $(".checkout-table"),
        checkoutTotal: $(".checkout-total"),
        status: $(".status"),
    },
    getStatus: function () {
        const codeOrder = window.location.pathname.split("/").pop();
        return http.get(`api/order/${codeOrder}/status/payment`, {}, "", false);
    },
    getData: function () {
        const codeOrder = window.location.pathname.split("/").pop();
        return http.get(`api/order/${codeOrder}`);
    },
    update: async function () {
        const { data } = await this.getData();
        const { user, package_items } = data;
        this.elements.orderCode.html(`#${data.order_code}`);
        this.elements.info.html(/* html */ `
                                <td>
                                    <p class="info-item">
                                        <span><b>Họ & Tên:</b></span>
                                        <span><i>${user.name}</i></span>
                                    </p>
                                    <p class="info-item">
                                        <span><b>Email:</b></span>
                                        <span><i>${user.email}</i></span>
                                    </p>
                                    <p class="info-item">
                                        <span><b>Địa chỉ:</b></span>
                                        <span><i>${
                                            user.address ?? "Trống"
                                        }</i></span>
                                    </p>
                                    <p class="info-item">
                                        <span>
                                            <b>Ngày đặt hàng:</b>
                                        </span>
                                        <span>
                                            <i>
                                                ${format(data.created_at)}
                                            </i>
                                        </span>
                                    </p>
                                </td>
                                <td></td>`);
        package_items.forEach((item) => {
            this.elements.checkoutTable.append(/* html */ `
                <tr>
                    <td
                        style="padding: 18px 15px 18px 0; display:flex; align-items: center; gap: 10px; border-bottom:1px solid #52526C4D;">
                        <ul style="padding: 0; margin: 0; list-style: none;">
                            <li>
                                <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #308e87;">
                                    ${item.package.name}
                                </h4>
                                <span style=" opacity: 0.8; font-size: 16px;">
                                    ${item.package.duration_days} ngày | ${
                item.package.download_document_limit
            } lượt tải
                                </span>
                            </li>
                        </ul>
                    </td>
                    <td
                        style="padding: 18px 15px; width: 12%; text-align: center; border-bottom:1px solid #52526C4D;">
                        <span style=" opacity: 0.8;">
                            ${formatNumber(item.price)}<sup>đ</sup>
                        </span>
                    </td>
                </tr>
            `);
        });
        this.elements.checkoutTotal.html(
            `${formatNumber(data.total_amount)}<sup>đ</sup>`
        );
    },

    updateStatus: function (status) {
        const { status: statusElement } = this.elements;
        let html = "";
        switch (status) {
            case "pending":
                html = `<i class="icon-checkout text-warning fal fa-history"></i><p class="title-checkout my-2 text-warning">Đang xử lý đơn hàng</p>`;
                break;
            case "success":
                html = `<i style="color: #308e87;" class="icon-checkout fal fa-badge-check"></i><p style="color: #308e87;" class="title-checkout my-2">Thanh toán thành công</p>`;
                break;
            case "failed":
                html = `<i class="icon-checkout text-danger fal fa-exclamation-circle"></i><p class="text-danger title-checkout my-2">Thanh toán thất bại</p>`;
                break;
            default:
                html = `<i class="icon-checkout text-warning fal fa-history"></i><p class="title-checkout my-2 text-warning">Đang xử lý đơn hàng</p>`;
                break;
        }
        statusElement.html(html);
    },
    init: function () {
        this.update();
        this.getStatus().then((res) => {
            if (res.data) {
                this.updateStatus(res.data);
            }
        });
        setInterval(() => {
            this.getStatus().then((res) => {
                if (res.data) {
                    this.updateStatus(res.data);
                }
            });
        }, 5000);
    },
};
pageCheckoutOrder.init();
