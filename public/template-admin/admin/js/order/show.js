const htmlItem = ({
    name,
    duration_days,
    download_document_limit,
    price,
    i,
    codeDownload,
    orderCode,
}) => {
    return /* html */ `
        <tr>
            <td style="padding-block: 18px; width: 5%; text-align: center;">
                ${i ? i : ""}
            </td>
            <td style="padding: 18px;">
                <ul style="padding: 0; margin: 0; list-style: none;">
                    <li>
                        <h4 style="font-weight:600; margin:4px 0px; font-size: 16px; color: #308e87;">
                            ${name}
                        </h4>
                        ${
                            duration_days && download_document_limit
                                ? `<span style=" opacity: 0.8; font-size: 16px;">
                                ${duration_days} ngày | ${download_document_limit} lượt tải
                                </span>`
                                : ""
                        }
                    </li>
                </ul>
            </td>
            <td style="padding: 18px; width: 12%; text-align: center;">
                <span style=" opacity: 0.8;">
                    ${formatNumber(price)}
                    <sup>đ</sup>
                </span>
            </td>
            <td style="padding: 18px; width: 12%; text-align: center;">
                ${
                    codeDownload
                        ? `<div class="text-center">
                            <a
                                href="/api/download/${codeDownload}/${orderCode}"
                                title="Xem" class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="tooltip" data-placement="top"
                            >
                                <i class="fa-regular fa-down-to-line"></i>
                            </a>
                        </div>`
                        : ""
                }
            </td>
        </tr>
        `;
};

const showOrderPage = {
    status: {
        pending: {
            text: "Chờ xác nhận",
            class: "text-warning fw-bold",
        },
        paid: {
            text: "Đã thanh toán",
            class: "text-success fw-bold",
        },
        cancelled: {
            text: "Đã hủy",
            class: "text-danger fw-bold",
        },
        completed: {
            text: "Hoàn thành",
            class: "text-info fw-bold",
        },
        complete: {
            text: "Hoàn thành",
            class: "text-info fw-bold",
        },
    },
    statusPayment: {
        pending: {
            text: "Chờ xác nhận",
            class: "text-warning fw-bold",
        },
        success: {
            text: "Đã thanh toán",
            class: "text-success fw-bold",
        },
        failed: {
            text: "Thất bại",
            class: "text-danger fw-bold",
        },
    },
    elements: {
        header: $(".card-header"),
        info: $(".card-body"),
        tableBody: $(".table-body"),
    },
    getData: function () {
        const orderCode = this.getOrderCode();
        return http.get(`api/order/${orderCode}`);
    },
    update: function (data) {
        const { user, package_items, document_items, payment } = data;
        this.elements.header.html(`
            <h4>Đơn hàng: <span class="text-danger">#${data.order_code}</span></h4>
            <div>
                <button class="btn btn-primary" id="btn-print">
                    <i class="fa-solid fa-print"></i>
                    In đơn hàng
                </button>
            </div>
        `);
        this.elements.info.html(/* html */ `
            <div class="col-md-6">
                <p class="info-item">
                    <span><b>Họ & Tên:</b></span>
                    <span><i>${user.name}</i></span>
                </p>
                <p class="info-item">
                    <span><b>Email:</b></span>
                    <span><i>${user.email}</i></span>
                </p>
                <p class="info-item">
                    <span><b>Trạng thái:</b></span>
                    <span><i class="${this.status[data.status].class}">
                        ${this.status[data.status].text}
                    </i></span>
                </p>
                <p class="info-item mb-3">
                    <span><b>Ngày đặt hàng:</b></span>
                    <span><i>${format(data.created_at)}</i></span>
                </p>
            </div>
            <div class="col-md-6">
                <p class="info-item">
                    <span><b>Hình thức thanh toán:</b></span>
                    <span><i>VnPay</i></span>
                </p>
                <p class="info-item">
                    <span><b>Trạng thái thanh toán:</b></span>
                    <span>
                        <i class="${this.statusPayment[payment.status].class}">
                            ${this.statusPayment[payment.status].text}
                        </i>
                    </span>
                </p>
                <p class="info-item">
                    <span><b>Tổng đơn hàng:</b></span>
                    <span><i>
                        ${package_items.length > 0 ? package_items.length : ""}
                        ${
                            document_items.length > 0
                                ? document_items.length
                                : ""
                        }
                    </i></span>
                </p>
                <p class="info-item">
                    <span><b>Loại đơn hàng:</b></span>
                    <span><i>
                        ${data.type === "package" ? "Gói nâng cấp" : ""}
                        ${data.type === "none" ? "Tài Liệu" : ""}
                    </i></span>
                </p>
            </div>
        `);
        if (package_items && package_items.length > 0) {
            package_items.forEach((item, i) => {
                this.elements.tableBody.append(
                    htmlItem({
                        name: item.package.name,
                        duration_days: item.package.duration_days,
                        download_document_limit:
                            item.package.download_document_limit,
                        price: item.package.price,
                        i: i + 1,
                    })
                );
            });
        }
        if (document_items && document_items.length > 0) {
            document_items.forEach((item, i) => {
                this.elements.tableBody.append(
                    htmlItem({
                        name: item.document.title,
                        price: item.price,
                        i: i + 1,
                        codeDownload: item.document.downloads[0]?.code,
                        orderCode: data.order_code,
                    })
                );
            });
        }

        this.elements.tableBody.append(
            htmlItem({
                name: `<p class="text-end mb-0" style="font-size: 14px;">Tổng phụ</p>`,
                price: data.subtotal,
            })
        );
        this.elements.tableBody.append(
            htmlItem({
                name: `<p class="text-end mb-0" style="font-size: 14px;">Giảm</p>`,
                price: -data.discount,
            })
        );
        this.elements.tableBody.append(
            htmlItem({
                name: `<p class="text-end mb-0" style="font-size: 14px;">Tổng cộng</p>`,
                price: data.total_amount,
            })
        );
    },
    init: async function () {
        const { data } = await this.getData();
        this.update(data);
        this.elements.header.on("click", "#btn-print", () => {
            window.print();
        });
    },
    getOrderCode: function () {
        return window.location.pathname.split("/").pop();
    },
};

showOrderPage.init();
