const upgradePage = {
    elements: {
        upgrade: $("#upgrade"),
    },
    data: [],
    getData: function () {
        return http.get("api/upgrade");
    },
    update: function () {
        const { upgrade } = this.elements;
        upgrade.empty();
        this.data.forEach((item) => {
            const price = formatNumber(item.price);
            const html = /*html*/ `<div class="col-xl-3 col-md-6">
                            <div class="card pricing-card border">
                                <div class="card-body">
                                    <h4 class="mb-3">${item.name}</h4>
                                    <h6 class="mb-4">
                                        ${price}<span class="tx-14 tx-muted op-7">đ</span>
                                        <span class="tx-14 tx-muted op-7">/</span>
                                        <span class="tx-14 tx-muted op-7">
                                            ${item.duration_days} ngày
                                        </span>
                                    </h6>
                                    <ul class="list-unstyled tx-14 fw-600 mb-4">
                                        <li class="list-item mb-3">
                                            <span class="flex-grow-1">Thanh toán VNPay</span>
                                        </li>
                                    </ul>
                                    <div class="d-grid">
                                        <button data-id="${item.id}" class="btn-upgrade btn btn-primary">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            upgrade.append(html);
        });
    },
    init: async function () {
        const { data } = await this.getData();
        this.data = data;
        this.update();
        this.registerEvent();
    },
    registerEvent: function () {
        const { upgrade } = this.elements;
        upgrade.on("click", ".btn-upgrade", async (e) => {
            const id = $(e.currentTarget).data("id");
            const { data } = await http.post("api/upgrade/payment", { package_id: id });
            if (data) {
                window.location.href = data;
            }
        });
    },
};

$(document).ready(function () {
    upgradePage.init();
});
