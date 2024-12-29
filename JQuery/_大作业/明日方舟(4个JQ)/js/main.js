!(function () {
  var _innerWidth = 0;
  var _innerHeight = 0;
  var _fontSize = 16;
  var _width = 0
    , _height = 0;
  function handleResize(baseFontSize, initial) {
    if (baseFontSize === void 0) {
      baseFontSize = 16;
    }
    var innerWidth = window.innerWidth
      , innerHeight = window.innerHeight;
    var width = Math.max(innerWidth, innerHeight);
    var height = Math.min(innerWidth, innerHeight);
    _width = width;
    _height = height;
    if (innerWidth === _innerWidth && innerHeight === _innerHeight) {
      return;
    } else {
      _innerWidth = innerWidth;
      _innerHeight = innerHeight;
    }
    var fontSize = baseFontSize;
    if (innerHeight >= innerWidth) {
      var designWidth = 750;
      var designHeight = 1334;
      if (innerWidth / innerHeight > designWidth / designHeight) {
        fontSize *= innerHeight / designHeight;
      } else {
        fontSize *= innerWidth / designWidth;
      }
    } else {
      var designWidth = 1920;
      var designHeight = 1080;
      if (innerWidth / innerHeight > designWidth / designHeight) {
        fontSize *= innerHeight / designHeight;
      } else {
        fontSize *= innerWidth / designWidth;
      }
    }
    var html = document.querySelector("html");
    if (initial) {
      var styleElem = document.createElement("style");
      styleElem.innerText = "html { font-size: " + fontSize + "px }";
      document.head.append(styleElem);
    } else {
      html.style.fontSize = fontSize + "px";
    }
    _fontSize = fontSize;
    window.__ROOT_FONT_SIZE = _fontSize;
    var realFontSize = Number(window.getComputedStyle(html)["font-size"].replace("px", ""));
    if (realFontSize !== fontSize) {
      if (!initial) {
        html.style.fontSize = (fontSize * fontSize) / realFontSize + "px";
      }
      _fontSize = (fontSize * fontSize) / realFontSize;
      window.__ROOT_FONT_SIZE = _fontSize;
    }
    if (window.navigator.userAgent.includes("HarmonyOS")) {
      var viewportMeta = document.querySelector("meta[name=viewport]");
      var radio = window.devicePixelRatio || 1;
      viewportMeta === null || viewportMeta === void 0 ? void 0 : viewportMeta.setAttribute("content", "width=" + window.outerWidth * radio + "px, initial-scale=" + (1 / radio).toFixed(3) + ", maximum-scale=" + (1 / radio).toFixed(3) + ", user-scalable=0");
    }
  }
  handleResize(void 0, true);
  var _timer = NaN;
  window.addEventListener("resize", function () {
    window.clearTimeout(_timer);
    _timer = window.setTimeout(function () {
      handleResize();
    }, 100);
  });
}
)();