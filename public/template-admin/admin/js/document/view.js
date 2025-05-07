const pageViewDocument = {
    elements: {
        documentView: $("#document-view"),
        documentTitle: $(".title-document"),
    },
    getData: function () {
        const id = this.getId();
        return http.get(`api/document/${id}`);
    },
    update: function ({ document, images }) {
        const documentView = this.elements.documentView;
        const documentTitle = this.elements.documentTitle;
        documentTitle.text(document.title);
        images.forEach((item) => {
            documentView.append(`
                <img src="${item.path}" alt="${item.path}"/>
            `);
        });
    },
    init: async function () {
        const { data } = await this.getData();
        if (data) {
            this.update(data);
        }
    },
    getId: function () {
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);
        return id;
    },
};

$(document).ready(() => {
    pageViewDocument.init();
});
