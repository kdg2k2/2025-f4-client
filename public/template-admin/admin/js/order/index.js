const orders = {
    elements: {
        datatable: $('#datatable'),
    },
    update: function () {
        destroyDataTable(this.elements.datatable);
        const listUrl = 'api/orders'
        const dataTable = createDataTableServerSide(
            this.elements.datatable,
            listUrl,
            [
                {
                    data: "name",
                    title: "Tên tài liệu",
                },
                {
                    data: "type",
                    title: "Loại tài liệu",
                },
                {
                    data: "issued_date",
                    title: "Ngày ban hành",
                },
                {
                    data: "author",
                    title: "Tác giả",
                },
                {
                    data: "price",
                    title: "Giá",
                },
                {
                    data: "uploader",
                    title: "Người tải lên",
                },
                {
                    data: "actions",
                    title: "Hành động",
                },
            ],
            (item) => ({
                name: item.name ?? "",
                type: item.type?.name ?? "",
                issued_date: item.issued_date
                    ? formatDateTime(item.issued_date)
                    : "",
                author: item.author ?? "",
                price: formatNumber(item.price) ?? "",
                uploader: item.uploader?.name ?? "",
                actions: ``,
            }),
            param
        );
    },
    init: function () {},
};
