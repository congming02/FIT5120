!function(e){var r={};function t(p){if(r[p])return r[p].exports;var a=r[p]={i:p,l:!1,exports:{}};return e[p].call(a.exports,a,a.exports,t),a.l=!0,a.exports}t.m=e,t.c=r,t.d=function(e,r,p){t.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:p})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,r){if(1&r&&(e=t(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var p=Object.create(null);if(t.r(p),Object.defineProperty(p,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var a in e)t.d(p,a,function(r){return e[r]}.bind(null,a));return p},t.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(r,"a",r),r},t.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},t.p="",t(t.s=6)}({0:function(e,r,t){"use strict";r.a=function(e){e("#ppw_subscribe_form").submit(function(r){r.preventDefault();const t=e("#ppw_email_subscribe").val().trim();/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(t)?(e("#ppw_subscribe_button").val("Saving..."),function(e,r,t){var p={action:"ppw_free_subscribe_request",settings:r,security_check:e("#ppw_subscribe_form_nonce").val()};!function(e,r,t){let p=!1;window.ppw_general_data?p=ppw_general_data.ajax_url:window.ppw_entire_site_data&&(p=ppw_entire_site_data.ajax_url),p&&e.ajax({url:p,type:"POST",data:r,timeout:5e3,success:function(e){t(e,null)},error:function(e){t(null,e)}})}(e,p,t)}(e,{ppw_email:t},function(r,t){r?(e("#ppw_subscribe_form").hide(),e("#ppw_subscribe_form_success").show()):t&&(400===t.status?(e(".ppw_subscribe_error").text(t.responseJSON.message),e(".ppw_subscribe_error").show("slow")):(e(".ppw_subscribe_error").text("Oops! Something went wrong. Please reload the page and try again."),e(".ppw_subscribe_error").show("slow"))),e("#ppw_subscribe_button").val("Get Lucky")})):(e(".ppw_subscribe_error").show("slow"),e("#ppw_email_subscribe").focus(),e("#ppw_subscribe_button").val("Get Lucky"))})}},6:function(e,r,t){"use strict";t.r(r);var p=t(0);!function(e){function r(r,t){!function(r,t){e.ajax({url:ppw_external_data.ajax_url,type:"POST",data:r,timeout:5e3,success:function(e){t(e,null)},error:function(e){t(null,e)}})}({action:"ppw_free_update_external_settings",settings:r,security_check:e("#ppw_general_form_nonce").val()},t)}e(function(){Object(p.a)(e),e("#wpp_external_v2_form").submit(function(t){t.preventDefault();var p=e("#wpp_recaptcha_v2_checkbox_api_key").val().trim(),a=e("#wpp_recaptcha_v2_checkbox_api_secret").val().trim();if(a?e(this).find("#ppwp-error-require-v2-secret").hide():(e(this).find("#ppwp-error-require-v2-secret").show(),e(this).find("#wpp_recaptcha_v2_checkbox_api_secret").focus()),p?e(this).find("#ppwp-error-require-v2-key").hide():(e(this).find("#ppwp-error-require-v2-key").show(),e(this).find("#wpp_recaptcha_v2_checkbox_api_key").focus()),""!==p&&""!==a){r({wpp_recaptcha_v2_checkbox_api_key:e("#wpp_recaptcha_v2_checkbox_api_key").val(),wpp_recaptcha_v2_checkbox_api_secret:e("#wpp_recaptcha_v2_checkbox_api_secret").val()},function(r,t){r&&(toastr.success("Great! Your settings have been updated successfully.","PPWP Lite"),location.reload(!0)),t&&(400===t.status?toastr.error(t.responseJSON.message,"PPWP Lite"):toastr.error("Oops! Something went wrong. Please try again!","PPWP Lite"),e("#v2_submit_btn").prop("disabled",!1))})}})}),e(function(){Object(p.a)(e),e("#wpp_external_v3_form").submit(function(t){t.preventDefault();var p=e("#wpp_recaptcha_api_key").val().trim(),a=e("#wpp_recaptcha_api_secret").val().trim();if(a?e(this).find("#ppwp-error-require-v3-secret").hide():(!1,e(this).find("#ppwp-error-require-v3-secret").show(),e(this).find("#wpp_recaptcha_api_secret").focus()),p?e(this).find("#ppwp-error-require-v3-key").hide():(!1,e(this).find("#ppwp-error-require-v3-key").show(),e(this).find("#wpp_recaptcha_api_key").focus()),""!==p&&""!==a){r({wpp_recaptcha_api_key:e("#wpp_recaptcha_api_key").val(),wpp_recaptcha_api_secret:e("#wpp_recaptcha_api_secret").val(),wpp_recaptcha_score:e("#wpp_recaptcha_score").val()},function(r,t){r&&(toastr.success("Great! Your settings have been updated successfully.","PPWP Lite"),location.reload(!0)),t&&(400===t.status?toastr.error(t.responseJSON.message,"PPWP Lite"):toastr.error("Oops! Something went wrong. Please try again!","PPWP Lite"),e("#v3_submit_btn").prop("disabled",!1))})}})})}(jQuery)}});