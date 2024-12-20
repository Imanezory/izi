(function ($) {

    var PremiumModalBoxHandler = function ($scope, $) {

        var $modalElem = $scope.find(".premium-modal-box-container"),
            settings = $modalElem.data("settings"),
            $modal = $modalElem.find(".premium-modal-box-modal-dialog"),
            id = $scope.data('id');

        if (!settings) {
            return;
        }

        if ("pageload" === settings.trigger) {
            $(document).ready(function () {
                setTimeout(function () {
                    $modalElem.find(".premium-modal-box-modal").modal();
                }, settings.delay * 1000);
            });
        } else if ("exit" === settings.trigger) {

            if (elementorFrontend.config.user) {
                $modalElem.find(".premium-modal-box-modal").modal();
            } else {
                if (!localStorage.getItem('paModal' + id)) {

                    var isTriggered = false;

                    elementorFrontend.elements.$window.on('mouseleave', function (e) {

                        if (!isTriggered && e.clientY <= 0) {
                            isTriggered = true;
                            $modalElem.find(".premium-modal-box-modal").modal();
                            $modalElem.find(".premium-modal-box-modal").on('hidden.bs.modal', function () {
                                console.log("tessssssssss");
                                localStorage.setItem('paModal' + id, true);
                            });
                        }

                    });
                }
            }

        }

        if ($modal.data("modal-animation") && " " != $modal.data("modal-animation")) {

            var animationDelay = $modal.data('delay-animation');

            // unsing IntersectionObserverAPI.
            var eleObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        setTimeout(function () {
                            $modal.css("opacity", "1").addClass("animated " + $modal.data("modal-animation"));
                        }, animationDelay * 1000);

                        eleObserver.unobserve(entry.target); // to only excecute the callback func once.
                    }
                });
            }, {
                threshold: 0.25
            });

            eleObserver.observe($modal[0]);
        }
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/premium-addon-modal-box.default', PremiumModalBoxHandler);
    });
})(jQuery);

