const pageViewDocument = {
    elements: {
        documentView: $("#document-view"),
    },
    getData: function () {
        const id = this.getId();
        return http.get(
            `https://admin.tanmaixanh.vn/api/document/show?document_id=${id}`
        );
    },
    update: function ({ path }) {
        const documentView = this.elements.documentView;
        documentView.html(`
            <iframe
                src="https://view.officeapps.live.com/op/embed.aspx?src=${path}&embedded=true"
                width="100%"
                height="800px"
                frameborder="0"
                allowfullscreen
                webkitallowfullscreen
                mozallowfullscreen
                sandbox="allow-same-origin allow-scripts allow-forms allow-popups allow-modals"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            ></iframe>
            `);
    },
    init: async function () {
        try {
            const { data } = await this.getData();
            if (data) {
                this.update(data);
            }
        } catch (error) {
            this.error(error);
        }
    },
    getId: function () {
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);
        return id;
    },
    error: function (error) {
        const documentView = this.elements.documentView;
        documentView.html(`
            <div class="alert alert-danger">
                <strong>
                ${error?.message || "Không thể tải tài liệu này"}
                </strong>
            </div>
        `);
    },
};

$(document).ready(() => {
    pageViewDocument.init();
});
