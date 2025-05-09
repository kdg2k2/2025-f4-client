const getData = () => {
    return http.get("/api/statistical");
};
const renderData = (data = []) => {
    console.log(data);
    data.forEach((item) => {
        const { title, value, type } = item;
        const html = `
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${title}</h5>
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-primary">
                                    ${type === "dong" ? formatNumber(value) : value}
                                    ${type === "dong" ? "₫" : ""}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $(".statistical").append(html);
    });
};

(async function(){
    const { data } = await getData();
    if (data) {
        renderData(data);
    }
})();
