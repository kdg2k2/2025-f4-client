const pageCheckoutOrder = {
    elements: {
        orderCode: $(".order-code"),
        info: $(".info-checkout"),
        checkoutTable: $(".checkout-table"),
        checkoutTotal: $(".checkout-total"),
    },
    getData: function () {
        const codeOrder = window.location.pathname.split("/").pop();
        return http.get(`api/order/${codeOrder}`);
    },
    update: async function () {
        const { data } = await this.getData();
        console.log(data);
        const { user, order_document } = data;
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
        order_document.forEach((item) => {
            this.elements.checkoutTable.append(/* html */ `
                <tr>
                    <td
                        style="padding: 18px 15px 18px 0; display:flex; align-items: center; gap: 10px; border-bottom:1px solid #52526C4D;">
                        <ul style="padding: 0; margin: 0; list-style: none;">
                            <li>
                                <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #308e87;">
                                    ${item.document.name}
                                </h4>
                                <span style=" opacity: 0.8; font-size: 16px;">
                                    ${item.document.author}
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
        this.elements.checkoutTotal.html(`${formatNumber(data.total_amount)}<sup>đ</sup>`);
    },
    init: function () {
        this.update();
    },
};
pageCheckoutOrder.init();
