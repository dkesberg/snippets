/**
 * Validate only letters
 * Accepts german Umlaute
 */
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-ZüöäÜÖÄß]+$/i.test(value);
}, "Letters only please");
