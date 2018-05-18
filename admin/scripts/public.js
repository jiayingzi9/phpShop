;(function() {
    var defaults = {
        width: 300,
        data: null,
        onLoadSuccess: null,
        onItemClick: null,
        afterToggleItem: null//节点完全展开|收缩触发
    };
    var _function = {
        init: function() {
            _function.render.call(this, this.$el, this.setting.data, 1);
            _function.initEvents.call(this);
        },
        render: function($parent, data, index) {
            var _setting = this.setting;
            var that = this;
            for(var i=0; i<data.length; i++) {
                var v = data[i];
                var $item = $(
                    '<li>'+
                    '<a href="'+(v.href?v.href:'javascript:void(0)')+'" target="'+v.target+'">'+v.text+'</a>'+
                    (v.checked
                        ? '<i class="jf-font-line jf-font-line-check"></i>' :
                        '<i class="jf-font-line jf-font-line-uncheck"></i>')+
                    '</li>'
                ).appendTo($parent.attr('data-index', index));
                if(v.data) {
                    for(var key in v.data) {
                        $item.attr('data-'+key, v.data[key]);
                    }
                }
                if(v.expand) {
                    $item.addClass('jf-public-expand');
                }
                if(v.children) {
                    var $ul = $('<ul></ul>').appendTo($item);
                    _function.render.call(this, $ul, v.children, index+1);
                }else {
                    $item.addClass('jf-public-leaf');
                }
                v.render && v.render($item, data);
            }
            _setting.onLoadSuccess && _setting.onLoadSuccess.call(this);
        },
        initEvents: function() {
            var _setting = this.setting;
            var that = this;
            this.$el.find('li > a').click(function(e) {
                var self = this;
                var $li = $(this).closest('li');
                _setting.onItemClick&&_setting.onItemClick.call(that, e);
                var actived = $li.hasClass('jf-public-active');
                var expanded = $li.hasClass('jf-public-expand');
                var isLeaf = $li.hasClass('jf-public-leaf');
                if(isLeaf) {//叶子节点：激活+激活上级节点+取消激活其他节点
                    that.$el.find('li').removeClass('jf-public-active');
                    $li.addClass('jf-public-active');
                    $li.parents('li').addClass('jf-public-active');
                }else {//非叶子节点：
                    if(expanded) {//展开状态：收缩
                        $li.children('ul').slideUp(function() {
                            $li.removeClass('jf-public-expand');
                            _setting.afterToggleItem&&_setting.afterToggleItem.call(that, e);
                        });
                    }else {//收缩状态：展开+收缩同级节点
                        $li.children('ul').slideDown(function() {
                            $li.addClass('jf-public-expand');
                            _setting.afterToggleItem&&_setting.afterToggleItem.call(that, e);
                        });
                        $li.siblings('li').children('ul').slideUp(function() {
                            $li.siblings('li').removeClass('jf-public-expand');
                            _setting.afterToggleItem&&_setting.afterToggleItem.call(that, e);
                        });
                    }
                }
            });
            this.$el.find('.jf-font-line').click(function() {
                var $children = $(this).closest('li').find('.jf-font-line');
                var $parent = $(this).closest('li').closest('ul').closest('li').children('.jf-font-line');
                var $parent_parent = $parent.closest('li').closest('ul').closest('li').children('.jf-font-line');
                if($(this).hasClass('jf-font-line-check')) {
                    $(this).removeClass('jf-font-line-check').addClass('jf-font-line-uncheck');
                    $children.removeClass('jf-font-line-check').addClass('jf-font-line-uncheck');
                    $parent.removeClass('jf-font-line-check').addClass('jf-font-line-uncheck');
                    $parent_parent.removeClass('jf-font-line-check').addClass('jf-font-line-uncheck');
                }else {
                    $(this).removeClass('jf-font-line-uncheck').addClass('jf-font-line-check');
                    $children.removeClass('jf-font-line-uncheck').addClass('jf-font-line-check');
                    var checkAll;
                    $(this).closest('li').siblings('li').each(function(i, v) {
                        checkAll = $(v).children('.jf-font-line').hasClass('jf-font-line-check');
                        return checkAll;
                    });
                    if(checkAll) {
                        $parent.removeClass('jf-font-line-uncheck').addClass('jf-font-line-check');
                    }
                    $parent.closest('li').siblings('li').each(function(i, v) {
                        checkAll = $(v).children('.jf-font-line').hasClass('jf-font-line-check');
                        return checkAll;
                    });
                    if(checkAll) {
                        $parent_parent.removeClass('jf-font-line-uncheck').addClass('jf-font-line-check');
                    }
                }
            });
        }
    };
    var public = function(setting) {
        this.setting = $.extend({}, defaults, setting);
        $.extend(this, {
            // $el: $('<ul class="jf-public nano-content"></ul>').css({width: this.setting.width})
            $el: $('<ul class="jf-public nano-content"></ul>')
        });
        _function.init.call(this);
    }
    public.prototype = {

    };
    window.JF ? window.JF['public'] = public : window['public'] = public;
})();