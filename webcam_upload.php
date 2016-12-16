<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

        <title>jQuery plugin for FileAPI</title>

        <meta name="keywords" content="jQuery, Plugin, FileAPI, html5, upload, multiupload, dragndrop, chunk, chunked, file, image, crop, resize, rotate, html5, rubaxa"/>
        <meta name="description" content="jQuery.fn.fileapi — the best plugin for jQuery (it is true)"/>

        <link href="//fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet" type="text/css"/>
        <link href="./statics/main.css" rel="stylesheet" type="text/css"/>
        <link href="./jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css"/>

        <script>
            var examples = [];
        </script>

    </head>
    <body>
        <div>
            <div class="body__top"></div>
            <div class="logo logo_small" style="position: absolute; left: 18px; top: 20px;"></div>
            <a class="view-on-github" href="https://github.com/RubaXa/jquery.fileapi/"></a>

            <div style="height: 30px;"></div>

            <div class="splash">
                <div class="splash__inner">
                    <div class="splash__blind">
                        <div class="splash__logo"></div>
                        <div class="splash__click-here"></div>
                    </div>
                    <div class="splash__cam"></div>
                </div>
            </div>


            <div class="content">
                <div class="content__head"></div>





                <div class="example">
                    <div class="example__left" style="padding-top:120px">
                        <div id="webcam" class="webcam">
                            <div class="js-preview webcam__preview"></div>
                            <div class="btn btn-success">
                                <div class="js-webcam">
                                    <span class="btn-txt">Webcam</span>
                                </div>
                                <div class="js-upload" style="display: none;">
                                    <div class="progress progress-success"><div class="js-progress bar"></div></div>
                                    <span class="btn-txt">Uploading</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="example__right">
                        <h2><span>Webcam</span></h2>
                    </div>

                    <script>
                        examples.push(function () {
                            $('#webcam').fileapi({
                                url: 'http://rubaxa.org/FileAPI/server/ctrl.php',
                                accept: 'image/*',
                                autoUpload: true,
                                elements: {
                                    active: {show: '.js-upload', hide: '.js-webcam'},
                                    preview: {
                                        el: '.js-preview',
                                        width: 200,
                                        height: 200
                                    },
                                    progress: '.js-progress'
                                }
                            });

                            $('.js-webcam', '#webcam').click(function (evt) {
                                var modal = $('#popup').modal({
                                    closeOnOverlayClick: false,
                                    onOpen: function (overlay) {
                                        $('.js-img', overlay).webcam({
                                            width: 320,
                                            height: 240,
                                            error: function (err) {
                                                // err — https://developer.mozilla.org/en-US/docs/Web/API/Navigator.getUserMedia
                                                $.modal().close();
                                                alert("Unfortunately, your browser does not support webcam.");
                                            },
                                            success: function (webcam) {
                                                $(overlay).on('click', '.js-upload', function () {
                                                    $('#webcam').fileapi('add', webcam.shot());
                                                    modal.close();
                                                });
                                            }
                                        });
                                    },
                                    onClose: function (overlay) {
                                        $('.js-img', overlay).webcam('destroy');
                                    }
                                });

                                modal.open();
                                evt.preventDefault();
                            });
                        });
                    </script>
                </div>






                <div style="margin-top: 80px;">
                    <div id="rubaxa-repos">Loading&hellip;</div>
                    <script src="//rubaxa.github.io/repos.js"></script>
                </div>
            </div>

        </div>


        <div id="popup" class="popup" style="display: none;">
            <div class="popup__body"><div class="js-img"></div></div>
            <div style="margin: 0 0 5px; text-align: center;">
                <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-1.8.2.min.js"></script>
        <script>!window.jQuery && document.write('<script src="/js/jquery.dev.js"><' + '/script>');</script>

        <script src="//yandex.st/highlightjs/7.2/highlight.min.js"></script>
        <script src="//yandex.st/jquery/easing/1.3/jquery.easing.min.js"></script>


        <script>
                                    var FileAPI = {
                                        debug: true
                                        , media: true
                                        , staticPath: './FileAPI/'
                                    };
        </script>
        <script src="./FileAPI/FileAPI.min.js"></script>
        <script src="./FileAPI/FileAPI.exif.js"></script>
        <script src="./jquery.fileapi.js"></script>
        <script src="./jcrop/jquery.Jcrop.min.js"></script>
        <script src="./statics/jquery.modal.js"></script>


        <script>
                                    jQuery(function ($) {
                                        var $blind = $('.splash__blind');

                                        $('.splash')
                                                .mouseenter(function () {
                                                    $('.splash__blind', this)
                                                            .animate({top: -10}, 'fast', 'easeInQuad')
                                                            .animate({top: 0}, 'slow', 'easeOutBounce')
                                                            ;
                                                })
                                                .click(function () {
                                                    if (!FileAPI.support.media) {
                                                        $blind.animate({top: -$(this).height()}, 'slow', 'easeOutQuart');
                                                    }

                                                    FileAPI.Camera.publish($('.splash__cam'), function (err, cam) {
                                                        if (err) {
                                                            alert("Unfortunately, your browser does not support webcam.");
                                                        } else {
                                                            $('.splash').off();
                                                            $blind.animate({top: -$(this).height()}, 'slow', 'easeOutQuart');
                                                        }
                                                    });
                                                })
                                                ;


                                        $('.example').each(function () {
                                            var $example = $(this);

                                            $example.find('h2').append('<div class="example__tabs"><a class="active" data-tab="javascript">code</a> <a data-tab="html">html</a></div>');

                                            $('<div></div>')
                                                    .append('<div data-code="javascript"><pre><code>' + $.trim(_getCode($example.find('script'))) + '</code></pre></div>')
                                                    .append('<div data-code="html" style="display: none"><pre><code>' + $.trim(_getCode($example.find('.example__left'), true)) + '</code></pre></div>')
                                                    .appendTo($example.find('.example__right'))
                                                    .find('[data-code]').each(function () {
                                                /** @namespace hljs -- highlight.js */
                                                if (window.hljs && (!$.browser.msie || parseInt($.browser.version, 10) > 7)) {
                                                    this.className = 'example__code language-' + $.attr(this, 'data-code');
                                                    hljs.highlightBlock(this);
                                                }
                                            })
                                                    ;
                                        });


                                        $('body').on('click', '[data-tab]', function (evt) {
                                            evt.preventDefault();

                                            var el = evt.currentTarget;
                                            var tab = $.attr(el, 'data-tab');
                                            var $example = $(el).closest('.example');

                                            $example
                                                    .find('[data-tab]')
                                                    .removeClass('active')
                                                    .filter('[data-tab="' + tab + '"]')
                                                    .addClass('active')
                                                    .end()
                                                    .end()
                                                    .find('[data-code]')
                                                    .hide()
                                                    .filter('[data-code="' + tab + '"]').show()
                                                    ;
                                        });


                                        function _getCode(node, all) {
                                            var code = FileAPI.filter($(node).prop('innerHTML').split('\n'), function (str) {
                                                return !!str;
                                            });
                                            if (!all) {
                                                code = code.slice(1, -2);
                                            }

                                            var tabSize = (code[0].match(/^\t+/) || [''])[0].length;

                                            return $('<div/>')
                                                    .text($.map(code, function (line) {
                                                        return line.substr(tabSize).replace(/\t/g, '   ');
                                                    }).join('\n'))
                                                    .prop('innerHTML')
                                                    .replace(/ disabled=""/g, '')
                                                    .replace(/&amp;lt;%/g, '<%')
                                                    .replace(/%&amp;gt;/g, '%>')
                                                    ;
                                        }


                                        // Init examples
                                        FileAPI.each(examples, function (fn) {
                                            fn();
                                        });
                                    });
        </script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-16483888-3', 'rubaxa.github.io');
            ga('send', 'pageview');
        </script>
    </body>
</html>
