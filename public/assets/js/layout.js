const Category = {
    elements: {
        documentField: $(".document-field"),
    },
    getData: function () {
        return http.get("/api/categories");
    },
    init: async function () {
        const { data } = await this.getData();
        const doccumentFields = this.tranformDataDocument(data.doccumentFields);
        this.update(doccumentFields);
    },
    update: function (doccumentFields) {
        this.elements.documentField.empty();
        doccumentFields.forEach((items) => {
            const res = this.createDocumentField(items);
            console.log(res);
            this.elements.documentField.append(res);
        });
    },
    createDocumentField: function (items = []) {
        const html = items.map((item) => {
            return `
                <li class="slide">
                    <a href="document/index" class="side-menu__item">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="d-block">${item.name}</h6>
                            </div>
                        </div>
                    </a>
                </li>
            `;
        });
        return `
            <div>
                <ul>
                    ${html.join("")}
                </ul>
            </div>
        `;
    },
    tranformDataDocument: function (data = []) {
        // loop data push to array 4 items
        let result = [];
        let temp = [];
        for (let i = 0; i < data.length; i++) {
            temp.push(data[i]);
            if (temp.length === 4) {
                result.push(temp);
                temp = [];
            }
        }
        if (temp.length > 0) {
            result.push(temp);
        }
        return result;
    },
};

Category.init();
