const notify = (position, style, mess, delay) => {
    // https://github.com/91ahmed/nostfly
    new Nostfly({
        style: style, // 'warning','success','error','attention','notify','note'
        position: position, // 'top-right','top-left','top-center','bottom-right','bottom-left','bottom-center'
        closeAnimate: "nostfly-close-slide-up", // 'nostfly-close-slide-right','nostfly-close-slide-left','nostfly-close-slide-up','nostfly-close-slide-down','nostfly-close-fade'
        openAnimate: "nostfly-open-slide-down", // 'nostfly-open-slide-right','nostfly-open-slide-left','nostfly-open-slide-up','nostfly-open-slide-down','nostfly-open-fade'
        content: mess,
        auto: false,
        loader: true,
        delay: delay,
    });
};
const makeNotifly = (type, mess, delay) => {
    notify("top-center", type, mess, delay);
    hideLoading();
};
const alertSuccess = (mess = null, delay = 6000) => {
    makeNotifly("success", mess, delay);
};
const alertErr = (mess = null, delay = 0) => {
    makeNotifly("error", mess, delay);
};
const alertInfo = (mess = null, delay = 6000) => {
    makeNotifly("notify", mess, delay);
};
const alertWarning = (mess = null, delay = 6000) => {
    makeNotifly("warning", mess, delay);
};
