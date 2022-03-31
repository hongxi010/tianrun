/*
 * @Author: zhiqiang
 * @Date: 2021-05-26 11:22:03
 * @LastEditTime: 2022-01-27 11:00:30
 */
(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            docEl.style.fontSize = 100 + 'px';
            if(clientWidth<=640){
                docEl.style.fontSize = 100 * (clientWidth / 860) + 'px';
            }else if(clientWidth<=1400){
                docEl.style.fontSize = 100 * (clientWidth / 1920) + 'px';
            }
        };

    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    recalc();
})(document, window);