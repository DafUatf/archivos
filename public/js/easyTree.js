(function ($) {
    $.fn.EasyTree = function (options) {
        var defaults = {
            selectable: true,
             drop:false,
            editable: false,
            addable: false,
            addable2: false,

            i18n: {
               
                confirmButtonLabel: 'Aceptar',
                editNull: 'No selecciono ningun archivo para editar。',
                editMultiple: 'Editar Multiples',
                addMultiple: 'Agregar Varios',
                collapseTip: 'Carpeta',
                expandTip: 'Abrir',
                selectTip: 'seleccionar',
                unselectTip: 'seleccionada',
                editTip: 'editar nombre',
                addTip: 'agregar',
                cancelButtonLabel: 'Cancelar'
            }
        };

        var warningAlert = $('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong></strong><span class="alert-content"></span> </div> ');
        var dangerAlert = $('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong></strong><span class="alert-content"></span> </div> ');

        var createInput = $('<div class="input-group"><input type="text" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-default btn-success confirm"></button></span><span class="input-group-btn"><button type="button" class="btn btn-default cancel"></button></span></div>');

        options = $.extend(defaults, options);

        this.each(function () {
            var easyTree = $(this);
            $.each($(easyTree).find('ul > li'), function() {
                var text;
                if($(this).is('li:has(ul)')) {
                    var children = $(this).find(' > ul');
                    $(children).remove();
                    text = $(this).text();
                    $(this).html('<span><span class="glyphicon"></span><a href="javascript: void(0);"></a> </span>');
                    $(this).find(' > span > span').addClass('glyphicon-folder-open');
                    $(this).find(' > span > a').text(text);
                    $(this).append(children);
                }
                else {
                    text = $(this).text();
                    $(this).html('<span><span class="glyphicon"></span><a href="javascript: void(0);"></a> </span>');
                    $(this).find(' > span > span').addClass('glyphicon-file');
                    $(this).find(' > span > a').text(text);
                }
            });

            $(easyTree).find('li:has(ul)').addClass('parent_li').find(' > span').attr('title', options.i18n.collapseTip);

            // add easy tree toolbar dom
            if (options.deletable || options.editable || options.addable || options.addable2) {
                $(easyTree).prepend('<div class="easy-tree-toolbar"></div> ');
            }

            // addable
            if (options.addable) {
                $(easyTree).find('.easy-tree-toolbar').append('<div class="create"><button  class="btn btn-primary"><span class="glyphicon glyphicon-level-up"></span>  Carpeta</button></div> ');
                $(easyTree).find('.easy-tree-toolbar .create > button').attr('title', options.i18n.addTip).click(function () {
                    var createBlock = $(easyTree).find('.easy-tree-toolbar .create');
                    $(createBlock).append(createInput);
                    $(createInput).find('input').focus();
                    $(createInput).find('.confirm').text(options.i18n.confirmButtonLabel);
                    $(createInput).find('.confirm').click(function () {
                        if ($(createInput).find('input').val() === '')
                            return;
                        var selected = getSelectedItems();
                        var item = $('<li><span><span class="glyphicon glyphicon-file"></span><a href="javascript: void(0);">' + $(createInput).find('input').val() + '</a> </span></li>');
                        $(item).find(' > span > span').attr('title', options.i18n.collapseTip);
                        $(item).find(' > span > a').attr('title', options.i18n.selectTip);
                        if (selected.length <= 0) {
                            $(easyTree).find(' > ul').append($(item));
                        } else if (selected.length > 1) {
                            $(easyTree).prepend(warningAlert);
                            $(easyTree).find('.alert .alert-content').text(options.i18n.addMultiple);
                        } else {
                            if ($(selected).hasClass('parent_li')) {
                                $(selected).find(' > ul').append(item);
                            } else {
                                $(selected).addClass('parent_li').find(' > span > span').addClass('glyphicon-folder-open').removeClass('glyphicon-file');
                                $(selected).append($('<ul></ul>')).find(' > ul').append(item);
                            }
                        }
                        $(createInput).find('input').val('');
                        if (options.selectable) {
                            $(item).find(' > span > a').attr('title', options.i18n.selectTip);
                            $(item).find(' > span > a').click(function (e) {
                                var li = $(this).parent().parent();
                                if (li.hasClass('li_selected')) {
                                    $(this).attr('title', options.i18n.selectTip);
                                    $(li).removeClass('li_selected');
                                }
                                else {
                                    $(easyTree).find('li.li_selected').removeClass('li_selected');
                                    $(this).attr('title', options.i18n.unselectTip);
                                    $(li).addClass('li_selected');
                                }

                                if (options.deletable || options.editable || options.addable) {
                                    var selected = getSelectedItems();
                                    if (options.editable) {
                                        if (selected.length <= 0 || selected.length > 1)
                                            $(easyTree).find('.easy-tree-toolbar .edit > button').addClass('disabled');
                                        else
                                            $(easyTree).find('.easy-tree-toolbar .edit > button').removeClass('disabled');
                                    }

                                    if (options.deletable) {
                                        if (selected.length <= 0 || selected.length > 1)
                                            $(easyTree).find('.easy-tree-toolbar .remove > button').addClass('disabled');
                                        else
                                            $(easyTree).find('.easy-tree-toolbar .remove > button').removeClass('disabled');
                                    }

                                }

                                e.stopPropagation();

                            });
                        }
                        $(createInput).remove();
                    });
                    $(createInput).find('.cancel').text(options.i18n.cancelButtonLabel);
                    $(createInput).find('.cancel').click(function () {
                        $(createInput).remove();
                    });
                });
            }

            // Agregar archivo

            if (options.addable2) {
                $(easyTree).find('.easy-tree-toolbar').append('<div class="archivo"><button  class="btn"><span class="glyphicon glyphicon-floppy-disk"></span>  Archivo</button></div> ');

            }


            // drop dar de baja

            if (options.drop) {
                $(easyTree).find('.easy-tree-toolbar').append('<div class="drop"><button  class="btn btn-danger"><span class="  glyphicon glyphicon-arrow-down"></span>  Dar Baja</button></div> ');

            }


            // editable
            if (options.editable) {
                $(easyTree).find('.easy-tree-toolbar').append('<div class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Editar</button></div> ');
                $(easyTree).find('.easy-tree-toolbar .edit > button').attr('title', options.i18n.editTip).click(function () {
                    $(easyTree).find('input.easy-tree-editor').remove();
                    $(easyTree).find('li > span > a:hidden').show();
                    var selected = getSelectedItems();
                    if (selected.length <= 0) {
                        $(easyTree).prepend(warningAlert);
                        $(easyTree).find('.alert .alert-content').html(options.i18n.editNull);
                    }
                    else if (selected.length > 1) {
                        $(easyTree).prepend(warningAlert);
                        $(easyTree).find('.alert .alert-content').html(options.i18n.editMultiple);
                    }
                    else {
                        var value = $(selected).find(' > span > a').text();
                        $(selected).find(' > span > a').hide();
                        $(selected).find(' > span').append('<input type="text" class="easy-tree-editor">');
                        var editor = $(selected).find(' > span > input.easy-tree-editor');
                        $(editor).val(value);
                        $(editor).focus();
                        $(editor).keydown(function (e) {
                            if (e.which == 13) {
                                if ($(editor).val() !== '') {
                                    $(selected).find(' > span > a').text($(editor).val());
                                    $(editor).remove();
                                    $(selected).find(' > span > a').show();
                                }
                            }
                        });
                    }
                });
            }

            
            // collapse or expand
            $(easyTree).delegate('li.parent_li > span', 'click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(':visible')) {
                    children.hide('fast');
                    $(this).attr('title', options.i18n.expandTip)
                        .find(' > span.glyphicon')
                        .addClass('glyphicon-folder-close')
                        .removeClass('glyphicon-folder-open');
                } else {
                    children.show('fast');
                    $(this).attr('title', options.i18n.collapseTip)
                        .find(' > span.glyphicon')
                        .addClass('glyphicon-folder-open')
                        .removeClass('glyphicon-folder-close');
                }
                e.stopPropagation();
            });

            // selectable, only single select
            if (options.selectable) {
                $(easyTree).find('li > span > a').attr('title', options.i18n.selectTip);
                $(easyTree).find('li > span > a').click(function (e) {
                    var li = $(this).parent().parent();
                    if (li.hasClass('li_selected')) {
                        $(this).attr('title', options.i18n.selectTip);
                        $(li).removeClass('li_selected');
                    }
                    else {
                        $(easyTree).find('li.li_selected').removeClass('li_selected');
                        $(this).attr('title', options.i18n.unselectTip);
                        $(li).addClass('li_selected');
                    }

                    if (options.deletable || options.editable || options.addable) {
                        var selected = getSelectedItems();
                        if (options.editable) {
                            if (selected.length <= 0 || selected.length > 1)
                                $(easyTree).find('.easy-tree-toolbar .edit > button').addClass('disabled');
                            else
                                $(easyTree).find('.easy-tree-toolbar .edit > button').removeClass('disabled');
                        }

                        if (options.deletable) {
                            if (selected.length <= 0 || selected.length > 1)
                                $(easyTree).find('.easy-tree-toolbar .remove > button').addClass('disabled');
                            else
                                $(easyTree).find('.easy-tree-toolbar .remove > button').removeClass('disabled');
                        }

                    }

                    e.stopPropagation();

                });
            }

            // Get selected items
            var getSelectedItems = function () {
                return $(easyTree).find('li.li_selected');
            };
        });
    };
})(jQuery);
