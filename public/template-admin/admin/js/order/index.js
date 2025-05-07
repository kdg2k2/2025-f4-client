const orders = {
    elements: {
        datatable: $("#datatable"),
    },
    update: function (param = {}) {
        destroyDataTable(this.elements.datatable);
        const listUrl = "api/order/list";
        const status = {
            pending: {
                text: "Chờ xác nhận",
                class: "badge badge-warning",
            },
            paid: {
                text: "Đã thanh toán",
                class: "badge badge-success",
            },
            cancelled: {
                text: "Đã hủy",
                class: "badge badge-danger",
            },
            completed: {
                text: "Hoàn thành",
                class: "badge badge-info",
            },
            complete: {
                text: "Hoàn thành",
                class: "badge badge-info",
            },
        };
        const dataTable = createDataTableServerSide(
            this.elements.datatable,
            listUrl,
            [
                {
                    data: "index",
                    title: "STT",
                },
                {
                    data: "info",
                    title: "Thông tin",
                },
                {
                    data: "created_at",
                    title: "Ngày tạo",
                },
                {
                    data: "status",
                    title: "Trạng thái",
                },
                {
                    data: "actions",
                    title: "Hành động",
                },
            ],
            (item, i) => {
                return {
                    index: i + 1,
                    info: `<a href="">${item.order_code}</a><br> ${item.user.name} <br> ${item.user.email}`,
                    created_at: format(item.created_at),
                    status: `<div class="text-center">
                                <span class="${status[item.status]?.class}">
                                ${status[item.status]?.text}
                            </span></div>`,
                    actions: `
                        <div class="text-center">
                            <a href="/admin/orders/${item.order_code}" title="Xem" class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="tooltip" data-placement="top"><i class="fa-solid fa-eye"></i></a>
                        </div>`,
                };
            },
            param
        );
    },
    init: function () {
        this.update({ paginate: 1 });
    },
};

$(document).ready(function () {
    orders.init();
});
