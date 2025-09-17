define([], function () {
    'use strict';

    return function (config, element) {
        // Hide the element initially
        element.style.display = 'none';

        var delay = config.config.delay || 5000;
        var bgColor = config.config.bgColor || '#FFEB3B';
        var textColor = config.config.textColor || '#000000';

        // Show the element after delay
        setTimeout(function () {
            element.style.display = 'block';
            element.style.color = textColor;
            element.style.backgroundColor = bgColor;
        }, delay);
    }
});
