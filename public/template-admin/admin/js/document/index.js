const datatable = $("#datatable");
const listUrl = "/api/document";
const paymentUrl = "";

const getDocuments = (param) => {
    destroyDataTable(datatable);
    const dataTable = createDataTableServerSide(
        datatable,
        listUrl,
        [
            {
                data: "title",
                title: "Tên tài liệu",
            },
            {
                data: "type",
                title: "Loại tài liệu",
            },
            {
                data: "field",
                title: "Lĩnh vực",
            },
            {
                data: "price",
                title: "Giá",
            },
            {
                data: "download_count",
                title: "Lượt tải",
            },
            {
                data: "actions",
                title: "Hành động",
                width: '100px'
            },
        ],
        (item) => {
            const btnView = `<a href="/admin/documents/${item.id}" title="Xem" class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="tooltip" data-placement="top"><i class="fa-solid fa-eye"></i></a>`;
            const btnAddCart = `<span data-id="${item.id}" title="Thêm vào giỏ hàng" class="btn btn-sm btn-primary btn-add-cart" data-bs-toggle="tooltip" data-placement="top"><i class="fal fa-cart-plus"></i></span>`;
            const btnBuy = `<a href="${paymentUrl}?id=${item.id}" title="Mua tài liệu" class="btn btn-sm btn-outline-success rounded-pill" data-bs-toggle="tooltip" data-placement="top"><i class="fal fa-money-bill-alt"></i></a>`;
            return {
                title: item.title ?? "",
                type: item.type?.name ?? "",
                field: item.type?.field?.name ?? "",
                author: item.author ?? "",
                price: formatNumber(item.price) ?? "",
                download_count: item.download_count ?? "",
                actions: `<div class="text-center">${btnAddCart}</div>`,
            };
        },
        param
    );
};

const getDocumentTypes = (value) =>
    http.get("api/document/types", { paginate: 0, field_id: value });

const getDocumentFields = () =>
    http.get("api/document/fields", { paginate: 0 });

const main = () => {
    getDocuments({ paginate: 1 });
    $(document).on("click", ".btn-add-cart", async function (e) {
        e.preventDefault();
        const id = $(this).data("id");
        cartModule.add(id);
    });
};

const renderSelectTypes = async (val) => {
    const { data } = await getDocumentTypes(val);
    const filterType = $("#filter-type");
    filterType.append(`<option value=''>-----Chọn-----</option>`);
    data.forEach((item) => {
        filterType.append(`<option value="${item.id}">${item.name}</option>`);
    });
    filterType.attr("disabled", false);
    refreshSumoSelect();
};

const renderSelectFields = async () => {
    const { data } = await getDocumentFields();
    const filterFields = $("#filter-fields");
    filterFields.append(`<option value=''>-----Chọn-----</option>`);
    data.forEach((item) => {
        filterFields.append(`<option value="${item.id}">${item.name}</option>`);
    });
    refreshSumoSelect();
};

$(document).ready(() => {
    renderSelectFields();
    if ($("#filter-fields").val()) renderSelectTypes($("#filter-fields").val());
    main();
    $("#btn-filter").on("click", () => {
        const filterType = $("#filter-type").val();
        let param = {
            paginate: 1,
            type_id: filterType,
        };
        getDocuments(param);
    });
});

$("#filter-fields").on("change", function () {
    const val = $(this).val();
    const filterType = $("#filter-type");
    filterType.empty();
    filterType.attr("disabled", true);
    if (val) renderSelectTypes(val);
    else {
        filterType.attr("disabled", true);
        refreshSumoSelect();
    }
});
