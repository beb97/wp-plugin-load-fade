jQuery( window ).on("beforeunload", function() {
    document.body.style.transition = "opacity {delay}ms".replace('{delay}', parseFloat(lf_conf.delay));
    document.body.style.opacity = parseFloat(lf_conf.opacity) ;
});

