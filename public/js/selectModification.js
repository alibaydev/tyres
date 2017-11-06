(function($, exports) {

    function CarSelectModification() {

    }

    CarSelectModification.prototype.init = function() {
        this.$brand = $('.select-modification .select-brand');
        this.$model = $('.select-modification .select-model');
        this.$generation = $('.select-modification .select-generation');
        this.$modification = $('.select-modification .select-modification');

        this.$document = $(document);

        _initChangeBrand.apply(this);
        _initChangeModel.apply(this);
    };

    function _initChangeBrand() {
        var self = this;

        this.$brand.on('change', function() {
            var brandId = $(this).val();

            self.$model.attr('disabled', brandId == 0);
            self.$model.find('option').not(':first').remove();

            if (brandId == 0) {
                self.$model.val(0);
                self.$model.trigger('change');

                return;
            }

            $.getJSON('/brands/' + brandId + '/models', function(data) {
                var $options = data.map(function(option) {
                    return $('<option/>').val(option.id).text(option.name);
                });

                self.$model.append($options);
            });
        });
    }

    function _initChangeModel() {
        var self = this;

        this.$model.on('change', function() {
            var modelId = $(this).val();

            self.$generation.find('option').not(':first').remove();

            if (modelId == 0) {
                self.$generation.val(0);
                self.$generation.attr('disabled', true);
                self.$generation.trigger('change');

                return;
            }

            $.getJSON('/models/' + modelId + '/generations', function(data) {
                var $options = data.map(function(option) {
                    return $('<option/>').val(option.id).text(option.text);
                });

                self.$generation.appendChild($options);
            });
        });
    }

    function _initChangeGeneration() {
        var self = this;

        this.$model.on('change', function() {
            var generationId = $(this).val();

            self.$model.find('option').not(':first').remove();

            if (generationId == 0) {
                self.$modification.val(0);
                self.$modification.attr('disabled', true);
                self.$modification.trigger('change');

                return;
            }

            $.getJSON('/generations/' + generationId + '/modifications', function(data) {
                var $options = data.map(function(option) {
                    return $('<option/>').val(option.id).text(option.text);
                });

                self.$modification.appendChild($options);
            });
        });
    }

    exports.CarSelectModification = CarSelectModification;

}(jQuery, window));