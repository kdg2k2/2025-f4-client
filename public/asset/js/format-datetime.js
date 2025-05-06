const formatDateTime = (input) => {
    if (!/^\d{4}-\d{2}-\d{2}( \d{2}:\d{2}:\d{2})?$/.test(input)) {
        return "Invalid date format";
    }

    const date = new Date(input);

    if (isNaN(date.getTime())) {
        return "Invalid date";
    }

    const dd = String(date.getDate()).padStart(2, "0");
    const mm = String(date.getMonth() + 1).padStart(2, "0"); // Tháng bắt đầu từ 0
    const yyyy = date.getFullYear();

    const hh = String(date.getHours()).padStart(2, "0");
    const ii = String(date.getMinutes()).padStart(2, "0");
    const ss = String(date.getSeconds()).padStart(2, "0");

    return input.includes(" ")
        ? `${dd}/${mm}/${yyyy} ${hh}:${ii}:${ss}`
        : `${dd}/${mm}/${yyyy}`;
};

const format = (input, formatType) => {
    const date = new Date(input);
    if (isNaN(date.getTime())) {
        return "Invalid date";
    }
    const dd = String(date.getDate()).padStart(2, "0");
    const mm = String(date.getMonth() + 1).padStart(2, "0"); // Tháng bắt đầu từ 0
    const yyyy = date.getFullYear();
    const hh = String(date.getHours()).padStart(2, "0");
    const ii = String(date.getMinutes()).padStart(2, "0");
    const ss = String(date.getSeconds()).padStart(2, "0");
    switch (formatType) {
        case "dd/mm/yyyy":
            return `${dd}/${mm}/${yyyy}`;
        case "mm/dd/yyyy":
            return `${mm}/${dd}/${yyyy}`;
        case "yyyy-mm-dd":
            return `${yyyy}-${mm}-${dd}`;
        case "hh:mm:ss":
            return `${hh}:${ii}:${ss}`;
        case "dd/mm/yyyy hh:mm:ss":
            return `${dd}/${mm}/${yyyy} ${hh}:${ii}:${ss}`;
        default:
            return input.includes(" ")
                ? `${dd}/${mm}/${yyyy} ${hh}:${ii}:${ss}`
                : `${dd}/${mm}/${yyyy}`;
    }
}
