
function dialogo_janela_excluir_topico_ajuda(){
$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina
document.getElementById("div_janela_excluir_topico_ajuda").style.display = "inline"; // exibindo div
};
function beep_dialogo(tipo_beep){
tipo_beep = parseInt(tipo_beep); // converte para inteiro
switch(tipo_beep){
case 1:
arquivo_som = pasta_sons_sistema + "/mensagem_dialogo.mp3"; // arquivo de som
break;
case 2:
arquivo_som = pasta_sons_sistema + "/mensagem_dialogo_fecha.mp3"; // arquivo de som
break;
};
codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto
document.getElementById("campo_beep_notificacoes_gerais").innerHTML = codigo_html_bruto; // retorno
};
if (typeof jQuery === 'undefined') { throw new Error('Bootstrap\'s JavaScript requires jQuery') }
+function ($) {
  'use strict';
  function transitionEnd() {
    var el = document.createElement('bootstrap')
    var transEndEventNames = {
      WebkitTransition : 'webkitTransitionEnd',
      MozTransition    : 'transitionend',
      OTransition      : 'oTransitionEnd otransitionend',
      transition       : 'transitionend'
    }
    for (var name in transEndEventNames) {
      if (el.style[name] !== undefined) {
        return { end: transEndEventNames[name] }
      }
    }
    return false // explicit for ie8 (  ._.)
  }
  $.fn.emulateTransitionEnd = function (duration) {
    var called = false
    var $el = this
    $(this).one('bsTransitionEnd', function () { called = true })
    var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
    setTimeout(callback, duration)
    return this
  }
  $(function () {
    $.support.transition = transitionEnd()
    if (!$.support.transition) return
    $.event.special.bsTransitionEnd = {
      bindType: $.support.transition.end,
      delegateType: $.support.transition.end,
      handle: function (e) {
        if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
      }
    }
  })
}(jQuery);
+function ($) {
  'use strict';
  var dismiss = '[data-dismiss="alert"]'
  var Alert   = function (el) {
    $(el).on('click', dismiss, this.close)
  }
  Alert.VERSION = '3.2.0'
  Alert.prototype.close = function (e) {
    var $this    = $(this)
    var selector = $this.attr('data-target')
    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }
    var $parent = $(selector)
    if (e) e.preventDefault()
    if (!$parent.length) {
      $parent = $this.hasClass('alert') ? $this : $this.parent()
    }
    $parent.trigger(e = $.Event('close.bs.alert'))
    if (e.isDefaultPrevented()) return
    $parent.removeClass('in')
    function removeElement() {
      $parent.detach().trigger('closed.bs.alert').remove()
    }
    $.support.transition && $parent.hasClass('fade') ?
      $parent
        .one('bsTransitionEnd', removeElement)
        .emulateTransitionEnd(150) :
      removeElement()
  }
  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.alert')
      if (!data) $this.data('bs.alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }
  var old = $.fn.alert
  $.fn.alert             = Plugin
  $.fn.alert.Constructor = Alert
  $.fn.alert.noConflict = function () {
    $.fn.alert = old
    return this
  }
  $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)
}(jQuery);
+function ($) {
  'use strict';
  var Button = function (element, options) {
    this.$element  = $(element)
    this.options   = $.extend({}, Button.DEFAULTS, options)
    this.isLoading = false
  }
  Button.VERSION  = '3.2.0'
  Button.DEFAULTS = {
    loadingText: 'loading...'
  }
  Button.prototype.setState = function (state) {
    var d    = 'disabled'
    var $el  = this.$element
    var val  = $el.is('input') ? 'val' : 'html'
    var data = $el.data()
    state = state + 'Text'
    if (data.resetText == null) $el.data('resetText', $el[val]())
    $el[val](data[state] == null ? this.options[state] : data[state])
    setTimeout($.proxy(function () {
      if (state == 'loadingText') {
        this.isLoading = true
        $el.addClass(d).attr(d, d)
      } else if (this.isLoading) {
        this.isLoading = false
        $el.removeClass(d).removeAttr(d)
      }
    }, this), 0)
  }
  Button.prototype.toggle = function () {
    var changed = true
    var $parent = this.$element.closest('[data-toggle="buttons"]')
    if ($parent.length) {
      var $input = this.$element.find('input')
      if ($input.prop('type') == 'radio') {
        if ($input.prop('checked') && this.$element.hasClass('active')) changed = false
        else $parent.find('.active').removeClass('active')
      }
      if (changed) $input.prop('checked', !this.$element.hasClass('active')).trigger('change')
    }
    if (changed) this.$element.toggleClass('active')
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.button')
      var options = typeof option == 'object' && option
      if (!data) $this.data('bs.button', (data = new Button(this, options)))
      if (option == 'toggle') data.toggle()
      else if (option) data.setState(option)
    })
  }
  var old = $.fn.button
  $.fn.button             = Plugin
  $.fn.button.Constructor = Button
  $.fn.button.noConflict = function () {
    $.fn.button = old
    return this
  }
  $(document).on('click.bs.button.data-api', '[data-toggle^="button"]', function (e) {
    var $btn = $(e.target)
    if (!$btn.hasClass('btn')) $btn = $btn.closest('.btn')
    Plugin.call($btn, 'toggle')
    e.preventDefault()
  })
}(jQuery);
+function ($) {
  'use strict';
  var Carousel = function (element, options) {
    this.$element    = $(element).on('keydown.bs.carousel', $.proxy(this.keydown, this))
    this.$indicators = this.$element.find('.carousel-indicators')
    this.options     = options
    this.paused      =
    this.sliding     =
    this.interval    =
    this.$active     =
    this.$items      = null
    this.options.pause == 'hover' && this.$element
      .on('mouseenter.bs.carousel', $.proxy(this.pause, this))
      .on('mouseleave.bs.carousel', $.proxy(this.cycle, this))
  }
  Carousel.VERSION  = '3.2.0'
  Carousel.DEFAULTS = {
    interval: 5000,
    pause: 'hover',
    wrap: true
  }
  Carousel.prototype.keydown = function (e) {
    switch (e.which) {
      case 37: this.prev(); break
      case 39: this.next(); break
      default: return
    }
    e.preventDefault()
  }
  Carousel.prototype.cycle = function (e) {
    e || (this.paused = false)
    this.interval && clearInterval(this.interval)
    this.options.interval
      && !this.paused
      && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))
    return this
  }
  Carousel.prototype.getItemIndex = function (item) {
    this.$items = item.parent().children('.item')
    return this.$items.index(item || this.$active)
  }
  Carousel.prototype.to = function (pos) {
    var that        = this
    var activeIndex = this.getItemIndex(this.$active = this.$element.find('.item.active'))
    if (pos > (this.$items.length - 1) || pos < 0) return
    if (this.sliding)       return this.$element.one('slid.bs.carousel', function () { that.to(pos) }) // yes, "slid"
    if (activeIndex == pos) return this.pause().cycle()
    return this.slide(pos > activeIndex ? 'next' : 'prev', $(this.$items[pos]))
  }
  Carousel.prototype.pause = function (e) {
    e || (this.paused = true)
    if (this.$element.find('.next, .prev').length && $.support.transition) {
      this.$element.trigger($.support.transition.end)
      this.cycle(true)
    }
    this.interval = clearInterval(this.interval)
    return this
  }
  Carousel.prototype.next = function () {
    if (this.sliding) return
    return this.slide('next')
  }
  Carousel.prototype.prev = function () {
    if (this.sliding) return
    return this.slide('prev')
  }
  Carousel.prototype.slide = function (type, next) {
    var $active   = this.$element.find('.item.active')
    var $next     = next || $active[type]()
    var isCycling = this.interval
    var direction = type == 'next' ? 'left' : 'right'
    var fallback  = type == 'next' ? 'first' : 'last'
    var that      = this
    if (!$next.length) {
      if (!this.options.wrap) return
      $next = this.$element.find('.item')[fallback]()
    }
    if ($next.hasClass('active')) return (this.sliding = false)
    var relatedTarget = $next[0]
    var slideEvent = $.Event('slide.bs.carousel', {
      relatedTarget: relatedTarget,
      direction: direction
    })
    this.$element.trigger(slideEvent)
    if (slideEvent.isDefaultPrevented()) return
    this.sliding = true
    isCycling && this.pause()
    if (this.$indicators.length) {
      this.$indicators.find('.active').removeClass('active')
      var $nextIndicator = $(this.$indicators.children()[this.getItemIndex($next)])
      $nextIndicator && $nextIndicator.addClass('active')
    }
    var slidEvent = $.Event('slid.bs.carousel', { relatedTarget: relatedTarget, direction: direction }) // yes, "slid"
    if ($.support.transition && this.$element.hasClass('slide')) {
      $next.addClass(type)
      $next[0].offsetWidth // force reflow
      $active.addClass(direction)
      $next.addClass(direction)
      $active
        .one('bsTransitionEnd', function () {
          $next.removeClass([type, direction].join(' ')).addClass('active')
          $active.removeClass(['active', direction].join(' '))
          that.sliding = false
          setTimeout(function () {
            that.$element.trigger(slidEvent)
          }, 0)
        })
        .emulateTransitionEnd($active.css('transition-duration').slice(0, -1) * 1000)
    } else {
      $active.removeClass('active')
      $next.addClass('active')
      this.sliding = false
      this.$element.trigger(slidEvent)
    }
    isCycling && this.cycle()
    return this
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.carousel')
      var options = $.extend({}, Carousel.DEFAULTS, $this.data(), typeof option == 'object' && option)
      var action  = typeof option == 'string' ? option : options.slide
      if (!data) $this.data('bs.carousel', (data = new Carousel(this, options)))
      if (typeof option == 'number') data.to(option)
      else if (action) data[action]()
      else if (options.interval) data.pause().cycle()
    })
  }
  var old = $.fn.carousel
  $.fn.carousel             = Plugin
  $.fn.carousel.Constructor = Carousel
  $.fn.carousel.noConflict = function () {
    $.fn.carousel = old
    return this
  }
  $(document).on('click.bs.carousel.data-api', '[data-slide], [data-slide-to]', function (e) {
    var href
    var $this   = $(this)
    var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) // strip for ie7
    if (!$target.hasClass('carousel')) return
    var options = $.extend({}, $target.data(), $this.data())
    var slideIndex = $this.attr('data-slide-to')
    if (slideIndex) options.interval = false
    Plugin.call($target, options)
    if (slideIndex) {
      $target.data('bs.carousel').to(slideIndex)
    }
    e.preventDefault()
  })
  $(window).on('load', function () {
    $('[data-ride="carousel"]').each(function () {
      var $carousel = $(this)
      Plugin.call($carousel, $carousel.data())
    })
  })
}(jQuery);
+function ($) {
  'use strict';
  var Collapse = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Collapse.DEFAULTS, options)
    this.transitioning = null
    if (this.options.parent) this.$parent = $(this.options.parent)
    if (this.options.toggle) this.toggle()
  }
  Collapse.VERSION  = '3.2.0'
  Collapse.DEFAULTS = {
    toggle: true
  }
  Collapse.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }
  Collapse.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return
    var startEvent = $.Event('show.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return
    var actives = this.$parent && this.$parent.find('> .panel > .in')
    if (actives && actives.length) {
      var hasData = actives.data('bs.collapse')
      if (hasData && hasData.transitioning) return
      Plugin.call(actives, 'hide')
      hasData || actives.data('bs.collapse', null)
    }
    var dimension = this.dimension()
    this.$element
      .removeClass('collapse')
      .addClass('collapsing')[dimension](0)
    this.transitioning = 1
    var complete = function () {
      this.$element
        .removeClass('collapsing')
        .addClass('collapse in')[dimension]('')
      this.transitioning = 0
      this.$element
        .trigger('shown.bs.collapse')
    }
    if (!$.support.transition) return complete.call(this)
    var scrollSize = $.camelCase(['scroll', dimension].join('-'))
    this.$element
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(350)[dimension](this.$element[0][scrollSize])
  }
  Collapse.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return
    var startEvent = $.Event('hide.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return
    var dimension = this.dimension()
    this.$element[dimension](this.$element[dimension]())[0].offsetHeight
    this.$element
      .addClass('collapsing')
      .removeClass('collapse')
      .removeClass('in')
    this.transitioning = 1
    var complete = function () {
      this.transitioning = 0
      this.$element
        .trigger('hidden.bs.collapse')
        .removeClass('collapsing')
        .addClass('collapse')
    }
    if (!$.support.transition) return complete.call(this)
    this.$element
      [dimension](0)
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(350)
  }
  Collapse.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.collapse')
      var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)
      if (!data && options.toggle && option == 'show') option = !option
      if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }
  var old = $.fn.collapse
  $.fn.collapse             = Plugin
  $.fn.collapse.Constructor = Collapse
  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }
  $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
    var href
    var $this   = $(this)
    var target  = $this.attr('data-target')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') // strip for ie7
    var $target = $(target)
    var data    = $target.data('bs.collapse')
    var option  = data ? 'toggle' : $this.data()
    var parent  = $this.attr('data-parent')
    var $parent = parent && $(parent)
    if (!data || !data.transitioning) {
      if ($parent) $parent.find('[data-toggle="collapse"][data-parent="' + parent + '"]').not($this).addClass('collapsed')
      $this[$target.hasClass('in') ? 'addClass' : 'removeClass']('collapsed')
    }
    Plugin.call($target, option)
  })
}(jQuery);
+function ($) {
  'use strict';
  var backdrop = '.dropdown-backdrop'
  var toggle   = '[data-toggle="dropdown"]'
  var Dropdown = function (element) {
    $(element).on('click.bs.dropdown', this.toggle)
  }
  Dropdown.VERSION = '3.2.0'
  Dropdown.prototype.toggle = function (e) {
    var $this = $(this)
    if ($this.is('.disabled, :disabled')) return
    var $parent  = getParent($this)
    var isActive = $parent.hasClass('open')
    clearMenus()
    if (!isActive) {
      if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
        $('<div class="dropdown-backdrop"/>').insertAfter($(this)).on('click', clearMenus)
      }
      var relatedTarget = { relatedTarget: this }
      $parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))
      if (e.isDefaultPrevented()) return
      $this.trigger('focus')
      $parent
        .toggleClass('open')
        .trigger('shown.bs.dropdown', relatedTarget)
    }
    return false
  }
  Dropdown.prototype.keydown = function (e) {
    if (!/(38|40|27)/.test(e.keyCode)) return
    var $this = $(this)
    e.preventDefault()
    e.stopPropagation()
    if ($this.is('.disabled, :disabled')) return
    var $parent  = getParent($this)
    var isActive = $parent.hasClass('open')
    if (!isActive || (isActive && e.keyCode == 27)) {
      if (e.which == 27) $parent.find(toggle).trigger('focus')
      return $this.trigger('click')
    }
    var desc = ' li:not(.divider):visible a'
    var $items = $parent.find('[role="menu"]' + desc + ', [role="listbox"]' + desc)
    if (!$items.length) return
    var index = $items.index($items.filter(':focus'))
    if (e.keyCode == 38 && index > 0)                 index--                        // up
    if (e.keyCode == 40 && index < $items.length - 1) index++                        // down
    if (!~index)                                      index = 0
    $items.eq(index).trigger('focus')
  }
  function clearMenus(e) {
    if (e && e.which === 3) return
    $(backdrop).remove()
    $(toggle).each(function () {
      var $parent = getParent($(this))
      var relatedTarget = { relatedTarget: this }
      if (!$parent.hasClass('open')) return
      $parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))
      if (e.isDefaultPrevented()) return
      $parent.removeClass('open').trigger('hidden.bs.dropdown', relatedTarget)
    })
  }
  function getParent($this) {
    var selector = $this.attr('data-target')
    if (!selector) {
      selector = $this.attr('href')
      selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }
    var $parent = selector && $(selector)
    return $parent && $parent.length ? $parent : $this.parent()
  }
  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.dropdown')
      if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }
  var old = $.fn.dropdown
  $.fn.dropdown             = Plugin
  $.fn.dropdown.Constructor = Dropdown
  $.fn.dropdown.noConflict = function () {
    $.fn.dropdown = old
    return this
  }
  $(document)
    .on('click.bs.dropdown.data-api', clearMenus)
    .on('click.bs.dropdown.data-api', '.dropdown form', function (e) { e.stopPropagation() })
    .on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle)
    .on('keydown.bs.dropdown.data-api', toggle + ', [role="menu"], [role="listbox"]', Dropdown.prototype.keydown)
}(jQuery);
+function ($) {
  'use strict';
  var Modal = function (element, options) {
    this.options        = options
    this.$body          = $(document.body)
    this.$element       = $(element)
    this.$backdrop      =
    this.isShown        = null
    this.scrollbarWidth = 0
    if (this.options.remote) {
      this.$element
        .find('.modal-content')
        .load(this.options.remote, $.proxy(function () {
          this.$element.trigger('loaded.bs.modal')
        }, this))
    }
  }
  Modal.VERSION  = '3.2.0'
  Modal.DEFAULTS = {
    backdrop: true,
    keyboard: true,
    show: true
  }
  Modal.prototype.toggle = function (_relatedTarget) {
    return this.isShown ? this.hide() : this.show(_relatedTarget)
  }
  Modal.prototype.show = function (_relatedTarget) {
    var that = this
    var e    = $.Event('show.bs.modal', { relatedTarget: _relatedTarget })
    this.$element.trigger(e)
    if (this.isShown || e.isDefaultPrevented()) return
    this.isShown = true
    this.checkScrollbar()
    this.$body.addClass('modal-open')
    this.setScrollbar()
    this.escape()
    this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))
    this.backdrop(function () {
      var transition = $.support.transition && that.$element.hasClass('fade')
      if (!that.$element.parent().length) {
        that.$element.appendTo(that.$body) // don't move modals dom position
      }
      that.$element
        .show()
        .scrollTop(0)
      if (transition) {
        that.$element[0].offsetWidth // force reflow
      }
      that.$element
        .addClass('in')
        .attr('aria-hidden', false)
      that.enforceFocus()
      var e = $.Event('shown.bs.modal', { relatedTarget: _relatedTarget })
      transition ?
        that.$element.find('.modal-dialog') // wait for modal to slide in
          .one('bsTransitionEnd', function () {
            that.$element.trigger('focus').trigger(e)
          })
          .emulateTransitionEnd(300) :
        that.$element.trigger('focus').trigger(e)
    })
  }
  Modal.prototype.hide = function (e) {
    if (e) e.preventDefault()
    e = $.Event('hide.bs.modal')
    this.$element.trigger(e)
    if (!this.isShown || e.isDefaultPrevented()) return
    this.isShown = false
    this.$body.removeClass('modal-open')
    this.resetScrollbar()
    this.escape()
    $(document).off('focusin.bs.modal')
    this.$element
      .removeClass('in')
      .attr('aria-hidden', true)
      .off('click.dismiss.bs.modal')
    $.support.transition && this.$element.hasClass('fade') ?
      this.$element
        .one('bsTransitionEnd', $.proxy(this.hideModal, this))
        .emulateTransitionEnd(300) :
      this.hideModal()
  }
  Modal.prototype.enforceFocus = function () {
    $(document)
      .off('focusin.bs.modal') // guard against infinite focus loop
      .on('focusin.bs.modal', $.proxy(function (e) {
        if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
          this.$element.trigger('focus')
        }
      }, this))
  }
  Modal.prototype.escape = function () {
    if (this.isShown && this.options.keyboard) {
      this.$element.on('keyup.dismiss.bs.modal', $.proxy(function (e) {
        e.which == 27 && this.hide()
      }, this))
    } else if (!this.isShown) {
      this.$element.off('keyup.dismiss.bs.modal')
    }
  }
  Modal.prototype.hideModal = function () {
    var that = this
    this.$element.hide()
    this.backdrop(function () {
      that.$element.trigger('hidden.bs.modal')
    })
  }
  Modal.prototype.removeBackdrop = function () {
    this.$backdrop && this.$backdrop.remove()
    this.$backdrop = null
  }
  Modal.prototype.backdrop = function (callback) {
    var that = this
    var animate = this.$element.hasClass('fade') ? 'fade' : ''
    if (this.isShown && this.options.backdrop) {
      var doAnimate = $.support.transition && animate
      this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
        .appendTo(this.$body)
      this.$element.on('click.dismiss.bs.modal', $.proxy(function (e) {
        if (e.target !== e.currentTarget) return
        this.options.backdrop == 'static'
          ? this.$element[0].focus.call(this.$element[0])
          : this.hide.call(this)
      }, this))
      if (doAnimate) this.$backdrop[0].offsetWidth // force reflow
      this.$backdrop.addClass('in')
      if (!callback) return
      doAnimate ?
        this.$backdrop
          .one('bsTransitionEnd', callback)
          .emulateTransitionEnd(150) :
        callback()
    } else if (!this.isShown && this.$backdrop) {
      this.$backdrop.removeClass('in')
      var callbackRemove = function () {
        that.removeBackdrop()
        callback && callback()
      }
      $.support.transition && this.$element.hasClass('fade') ?
        this.$backdrop
          .one('bsTransitionEnd', callbackRemove)
          .emulateTransitionEnd(150) :
        callbackRemove()
    } else if (callback) {
      callback()
    }
  }
  Modal.prototype.checkScrollbar = function () {
    if (document.body.clientWidth >= window.innerWidth) return
    this.scrollbarWidth = this.scrollbarWidth || this.measureScrollbar()
  }
  Modal.prototype.setScrollbar = function () {
    var bodyPad = parseInt((this.$body.css('padding-right') || 0), 10)
    if (this.scrollbarWidth) this.$body.css('padding-right', bodyPad + this.scrollbarWidth)
  }
  Modal.prototype.resetScrollbar = function () {
    this.$body.css('padding-right', '')
  }
  Modal.prototype.measureScrollbar = function () { // thx walsh
    var scrollDiv = document.createElement('div')
    scrollDiv.className = 'modal-scrollbar-measure'
    this.$body.append(scrollDiv)
    var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth
    this.$body[0].removeChild(scrollDiv)
    return scrollbarWidth
  }
  function Plugin(option, _relatedTarget) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.modal')
      var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)
      if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
      if (typeof option == 'string') data[option](_relatedTarget)
      else if (options.show) data.show(_relatedTarget)
    })
  }
  var old = $.fn.modal
  $.fn.modal             = Plugin
  $.fn.modal.Constructor = Modal
  $.fn.modal.noConflict = function () {
    $.fn.modal = old
    return this
  }
  $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function (e) {
    var $this   = $(this)
    var href    = $this.attr('href')
    var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) // strip for ie7
    var option  = $target.data('bs.modal') ? 'toggle' : $.extend({ remote: !/#/.test(href) && href }, $target.data(), $this.data())
    if ($this.is('a')) e.preventDefault()
    $target.one('show.bs.modal', function (showEvent) {
      if (showEvent.isDefaultPrevented()) return // only register focus restorer if modal will actually get shown
      $target.one('hidden.bs.modal', function () {
        $this.is(':visible') && $this.trigger('focus')
      })
    })
    Plugin.call($target, option, this)
  })
}(jQuery);
+function ($) {
  'use strict';
  var Tooltip = function (element, options) {
    this.type       =
    this.options    =
    this.enabled    =
    this.timeout    =
    this.hoverState =
    this.$element   = null
    this.init('tooltip', element, options)
  }
  Tooltip.VERSION  = '3.2.0'
  Tooltip.DEFAULTS = {
    animation: true,
    placement: 'top',
    selector: false,
    template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
    trigger: 'hover focus',
    title: '',
    delay: 0,
    html: false,
    container: false,
    viewport: {
      selector: 'body',
      padding: 0
    }
  }
  Tooltip.prototype.init = function (type, element, options) {
    this.enabled   = true
    this.type      = type
    this.$element  = $(element)
    this.options   = this.getOptions(options)
    this.$viewport = this.options.viewport && $(this.options.viewport.selector || this.options.viewport)
    var triggers = this.options.trigger.split(' ')
    for (var i = triggers.length; i--;) {
      var trigger = triggers[i]
      if (trigger == 'click') {
        this.$element.on('click.' + this.type, this.options.selector, $.proxy(this.toggle, this))
      } else if (trigger != 'manual') {
        var eventIn  = trigger == 'hover' ? 'mouseenter' : 'focusin'
        var eventOut = trigger == 'hover' ? 'mouseleave' : 'focusout'
        this.$element.on(eventIn  + '.' + this.type, this.options.selector, $.proxy(this.enter, this))
        this.$element.on(eventOut + '.' + this.type, this.options.selector, $.proxy(this.leave, this))
      }
    }
    this.options.selector ?
      (this._options = $.extend({}, this.options, { trigger: 'manual', selector: '' })) :
      this.fixTitle()
  }
  Tooltip.prototype.getDefaults = function () {
    return Tooltip.DEFAULTS
  }
  Tooltip.prototype.getOptions = function (options) {
    options = $.extend({}, this.getDefaults(), this.$element.data(), options)
    if (options.delay && typeof options.delay == 'number') {
      options.delay = {
        show: options.delay,
        hide: options.delay
      }
    }
    return options
  }
  Tooltip.prototype.getDelegateOptions = function () {
    var options  = {}
    var defaults = this.getDefaults()
    this._options && $.each(this._options, function (key, value) {
      if (defaults[key] != value) options[key] = value
    })
    return options
  }
  Tooltip.prototype.enter = function (obj) {
    var self = obj instanceof this.constructor ?
      obj : $(obj.currentTarget).data('bs.' + this.type)
    if (!self) {
      self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
      $(obj.currentTarget).data('bs.' + this.type, self)
    }
    clearTimeout(self.timeout)
    self.hoverState = 'in'
    if (!self.options.delay || !self.options.delay.show) return self.show()
    self.timeout = setTimeout(function () {
      if (self.hoverState == 'in') self.show()
    }, self.options.delay.show)
  }
  Tooltip.prototype.leave = function (obj) {
    var self = obj instanceof this.constructor ?
      obj : $(obj.currentTarget).data('bs.' + this.type)
    if (!self) {
      self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
      $(obj.currentTarget).data('bs.' + this.type, self)
    }
    clearTimeout(self.timeout)
    self.hoverState = 'out'
    if (!self.options.delay || !self.options.delay.hide) return self.hide()
    self.timeout = setTimeout(function () {
      if (self.hoverState == 'out') self.hide()
    }, self.options.delay.hide)
  }
  Tooltip.prototype.show = function () {
    var e = $.Event('show.bs.' + this.type)
    if (this.hasContent() && this.enabled) {
      this.$element.trigger(e)
      var inDom = $.contains(document.documentElement, this.$element[0])
      if (e.isDefaultPrevented() || !inDom) return
      var that = this
      var $tip = this.tip()
      var tipId = this.getUID(this.type)
      this.setContent()
      $tip.attr('id', tipId)
      this.$element.attr('aria-describedby', tipId)
      if (this.options.animation) $tip.addClass('fade')
      var placement = typeof this.options.placement == 'function' ?
        this.options.placement.call(this, $tip[0], this.$element[0]) :
        this.options.placement
      var autoToken = /\s?auto?\s?/i
      var autoPlace = autoToken.test(placement)
      if (autoPlace) placement = placement.replace(autoToken, '') || 'top'
      $tip
        .detach()
        .css({ top: 0, left: 0, display: 'block' })
        .addClass(placement)
        .data('bs.' + this.type, this)
      this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element)
      var pos          = this.getPosition()
      var actualWidth  = $tip[0].offsetWidth
      var actualHeight = $tip[0].offsetHeight
      if (autoPlace) {
        var orgPlacement = placement
        var $parent      = this.$element.parent()
        var parentDim    = this.getPosition($parent)
        placement = placement == 'bottom' && pos.top   + pos.height       + actualHeight - parentDim.scroll > parentDim.height ? 'top'    :
                    placement == 'top'    && pos.top   - parentDim.scroll - actualHeight < 0                                   ? 'bottom' :
                    placement == 'right'  && pos.right + actualWidth      > parentDim.width                                    ? 'left'   :
                    placement == 'left'   && pos.left  - actualWidth      < parentDim.left                                     ? 'right'  :
                    placement
        $tip
          .removeClass(orgPlacement)
          .addClass(placement)
      }
      var calculatedOffset = this.getCalculatedOffset(placement, pos, actualWidth, actualHeight)
      this.applyPlacement(calculatedOffset, placement)
      var complete = function () {
        that.$element.trigger('shown.bs.' + that.type)
        that.hoverState = null
      }
      $.support.transition && this.$tip.hasClass('fade') ?
        $tip
          .one('bsTransitionEnd', complete)
          .emulateTransitionEnd(150) :
        complete()
    }
  }
  Tooltip.prototype.applyPlacement = function (offset, placement) {
    var $tip   = this.tip()
    var width  = $tip[0].offsetWidth
    var height = $tip[0].offsetHeight
    var marginTop = parseInt($tip.css('margin-top'), 10)
    var marginLeft = parseInt($tip.css('margin-left'), 10)
    if (isNaN(marginTop))  marginTop  = 0
    if (isNaN(marginLeft)) marginLeft = 0
    offset.top  = offset.top  + marginTop
    offset.left = offset.left + marginLeft
    $.offset.setOffset($tip[0], $.extend({
      using: function (props) {
        $tip.css({
          top: Math.round(props.top),
          left: Math.round(props.left)
        })
      }
    }, offset), 0)
    $tip.addClass('in')
    var actualWidth  = $tip[0].offsetWidth
    var actualHeight = $tip[0].offsetHeight
    if (placement == 'top' && actualHeight != height) {
      offset.top = offset.top + height - actualHeight
    }
    var delta = this.getViewportAdjustedDelta(placement, offset, actualWidth, actualHeight)
    if (delta.left) offset.left += delta.left
    else offset.top += delta.top
    var arrowDelta          = delta.left ? delta.left * 2 - width + actualWidth : delta.top * 2 - height + actualHeight
    var arrowPosition       = delta.left ? 'left'        : 'top'
    var arrowOffsetPosition = delta.left ? 'offsetWidth' : 'offsetHeight'
    $tip.offset(offset)
    this.replaceArrow(arrowDelta, $tip[0][arrowOffsetPosition], arrowPosition)
  }
  Tooltip.prototype.replaceArrow = function (delta, dimension, position) {
    this.arrow().css(position, delta ? (50 * (1 - delta / dimension) + '%') : '')
  }
  Tooltip.prototype.setContent = function () {
    var $tip  = this.tip()
    var title = this.getTitle()
    $tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title)
    $tip.removeClass('fade in top bottom left right')
  }
  Tooltip.prototype.hide = function () {
    var that = this
    var $tip = this.tip()
    var e    = $.Event('hide.bs.' + this.type)
    this.$element.removeAttr('aria-describedby')
    function complete() {
      if (that.hoverState != 'in') $tip.detach()
      that.$element.trigger('hidden.bs.' + that.type)
    }
    this.$element.trigger(e)
    if (e.isDefaultPrevented()) return
    $tip.removeClass('in')
    $.support.transition && this.$tip.hasClass('fade') ?
      $tip
        .one('bsTransitionEnd', complete)
        .emulateTransitionEnd(150) :
      complete()
    this.hoverState = null
    return this
  }
  Tooltip.prototype.fixTitle = function () {
    var $e = this.$element
    if ($e.attr('title') || typeof ($e.attr('data-original-title')) != 'string') {
      $e.attr('data-original-title', $e.attr('title') || '').attr('title', '')
    }
  }
  Tooltip.prototype.hasContent = function () {
    return this.getTitle()
  }
  Tooltip.prototype.getPosition = function ($element) {
    $element   = $element || this.$element
    var el     = $element[0]
    var isBody = el.tagName == 'BODY'
    return $.extend({}, (typeof el.getBoundingClientRect == 'function') ? el.getBoundingClientRect() : null, {
      scroll: isBody ? document.documentElement.scrollTop || document.body.scrollTop : $element.scrollTop(),
      width:  isBody ? $(window).width()  : $element.outerWidth(),
      height: isBody ? $(window).height() : $element.outerHeight()
    }, isBody ? { top: 0, left: 0 } : $element.offset())
  }
  Tooltip.prototype.getCalculatedOffset = function (placement, pos, actualWidth, actualHeight) {
    return placement == 'bottom' ? { top: pos.top + pos.height,   left: pos.left + pos.width / 2 - actualWidth / 2  } :
           placement == 'top'    ? { top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2  } :
           placement == 'left'   ? { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth } :
         { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width   }
  }
  Tooltip.prototype.getViewportAdjustedDelta = function (placement, pos, actualWidth, actualHeight) {
    var delta = { top: 0, left: 0 }
    if (!this.$viewport) return delta
    var viewportPadding = this.options.viewport && this.options.viewport.padding || 0
    var viewportDimensions = this.getPosition(this.$viewport)
    if (/right|left/.test(placement)) {
      var topEdgeOffset    = pos.top - viewportPadding - viewportDimensions.scroll
      var bottomEdgeOffset = pos.top + viewportPadding - viewportDimensions.scroll + actualHeight
      if (topEdgeOffset < viewportDimensions.top) { // top overflow
        delta.top = viewportDimensions.top - topEdgeOffset
      } else if (bottomEdgeOffset > viewportDimensions.top + viewportDimensions.height) { // bottom overflow
        delta.top = viewportDimensions.top + viewportDimensions.height - bottomEdgeOffset
      }
    } else {
      var leftEdgeOffset  = pos.left - viewportPadding
      var rightEdgeOffset = pos.left + viewportPadding + actualWidth
      if (leftEdgeOffset < viewportDimensions.left) { // left overflow
        delta.left = viewportDimensions.left - leftEdgeOffset
      } else if (rightEdgeOffset > viewportDimensions.width) { // right overflow
        delta.left = viewportDimensions.left + viewportDimensions.width - rightEdgeOffset
      }
    }
    return delta
  }
  Tooltip.prototype.getTitle = function () {
    var title
    var $e = this.$element
    var o  = this.options
    title = $e.attr('data-original-title')
      || (typeof o.title == 'function' ? o.title.call($e[0]) :  o.title)
    return title
  }
  Tooltip.prototype.getUID = function (prefix) {
    do prefix += ~~(Math.random() * 1000000)
    while (document.getElementById(prefix))
    return prefix
  }
  Tooltip.prototype.tip = function () {
    return (this.$tip = this.$tip || $(this.options.template))
  }
  Tooltip.prototype.arrow = function () {
    return (this.$arrow = this.$arrow || this.tip().find('.tooltip-arrow'))
  }
  Tooltip.prototype.validate = function () {
    if (!this.$element[0].parentNode) {
      this.hide()
      this.$element = null
      this.options  = null
    }
  }
  Tooltip.prototype.enable = function () {
    this.enabled = true
  }
  Tooltip.prototype.disable = function () {
    this.enabled = false
  }
  Tooltip.prototype.toggleEnabled = function () {
    this.enabled = !this.enabled
  }
  Tooltip.prototype.toggle = function (e) {
    var self = this
    if (e) {
      self = $(e.currentTarget).data('bs.' + this.type)
      if (!self) {
        self = new this.constructor(e.currentTarget, this.getDelegateOptions())
        $(e.currentTarget).data('bs.' + this.type, self)
      }
    }
    self.tip().hasClass('in') ? self.leave(self) : self.enter(self)
  }
  Tooltip.prototype.destroy = function () {
    clearTimeout(this.timeout)
    this.hide().$element.off('.' + this.type).removeData('bs.' + this.type)
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.tooltip')
      var options = typeof option == 'object' && option
      if (!data && option == 'destroy') return
      if (!data) $this.data('bs.tooltip', (data = new Tooltip(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }
  var old = $.fn.tooltip
  $.fn.tooltip             = Plugin
  $.fn.tooltip.Constructor = Tooltip
  $.fn.tooltip.noConflict = function () {
    $.fn.tooltip = old
    return this
  }
}(jQuery);
+function ($) {
  'use strict';
  var Popover = function (element, options) {
    this.init('popover', element, options)
  }
  if (!$.fn.tooltip) throw new Error('Popover requires tooltip.js')
  Popover.VERSION  = '3.2.0'
  Popover.DEFAULTS = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, {
    placement: 'right',
    trigger: 'click',
    content: '',
    template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
  })
  Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype)
  Popover.prototype.constructor = Popover
  Popover.prototype.getDefaults = function () {
    return Popover.DEFAULTS
  }
  Popover.prototype.setContent = function () {
    var $tip    = this.tip()
    var title   = this.getTitle()
    var content = this.getContent()
    $tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title)
    $tip.find('.popover-content').empty()[ // we use append for html objects to maintain js events
      this.options.html ? (typeof content == 'string' ? 'html' : 'append') : 'text'
    ](content)
    $tip.removeClass('fade top bottom left right in')
    if (!$tip.find('.popover-title').html()) $tip.find('.popover-title').hide()
  }
  Popover.prototype.hasContent = function () {
    return this.getTitle() || this.getContent()
  }
  Popover.prototype.getContent = function () {
    var $e = this.$element
    var o  = this.options
    return $e.attr('data-content')
      || (typeof o.content == 'function' ?
            o.content.call($e[0]) :
            o.content)
  }
  Popover.prototype.arrow = function () {
    return (this.$arrow = this.$arrow || this.tip().find('.arrow'))
  }
  Popover.prototype.tip = function () {
    if (!this.$tip) this.$tip = $(this.options.template)
    return this.$tip
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.popover')
      var options = typeof option == 'object' && option
      if (!data && option == 'destroy') return
      if (!data) $this.data('bs.popover', (data = new Popover(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }
  var old = $.fn.popover
  $.fn.popover             = Plugin
  $.fn.popover.Constructor = Popover
  $.fn.popover.noConflict = function () {
    $.fn.popover = old
    return this
  }
}(jQuery);
+function ($) {
  'use strict';
  function ScrollSpy(element, options) {
    var process  = $.proxy(this.process, this)
    this.$body          = $('body')
    this.$scrollElement = $(element).is('body') ? $(window) : $(element)
    this.options        = $.extend({}, ScrollSpy.DEFAULTS, options)
    this.selector       = (this.options.target || '') + ' .nav li > a'
    this.offsets        = []
    this.targets        = []
    this.activeTarget   = null
    this.scrollHeight   = 0
    this.$scrollElement.on('scroll.bs.scrollspy', process)
    this.refresh()
    this.process()
  }
  ScrollSpy.VERSION  = '3.2.0'
  ScrollSpy.DEFAULTS = {
    offset: 10
  }
  ScrollSpy.prototype.getScrollHeight = function () {
    return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
  }
  ScrollSpy.prototype.refresh = function () {
    var offsetMethod = 'offset'
    var offsetBase   = 0
    if (!$.isWindow(this.$scrollElement[0])) {
      offsetMethod = 'position'
      offsetBase   = this.$scrollElement.scrollTop()
    }
    this.offsets = []
    this.targets = []
    this.scrollHeight = this.getScrollHeight()
    var self     = this
    this.$body
      .find(this.selector)
      .map(function () {
        var $el   = $(this)
        var href  = $el.data('target') || $el.attr('href')
        var $href = /^#./.test(href) && $(href)
        return ($href
          && $href.length
          && $href.is(':visible')
          && [[$href[offsetMethod]().top + offsetBase, href]]) || null
      })
      .sort(function (a, b) { return a[0] - b[0] })
      .each(function () {
        self.offsets.push(this[0])
        self.targets.push(this[1])
      })
  }
  ScrollSpy.prototype.process = function () {
    var scrollTop    = this.$scrollElement.scrollTop() + this.options.offset
    var scrollHeight = this.getScrollHeight()
    var maxScroll    = this.options.offset + scrollHeight - this.$scrollElement.height()
    var offsets      = this.offsets
    var targets      = this.targets
    var activeTarget = this.activeTarget
    var i
    if (this.scrollHeight != scrollHeight) {
      this.refresh()
    }
    if (scrollTop >= maxScroll) {
      return activeTarget != (i = targets[targets.length - 1]) && this.activate(i)
    }
    if (activeTarget && scrollTop <= offsets[0]) {
      return activeTarget != (i = targets[0]) && this.activate(i)
    }
    for (i = offsets.length; i--;) {
      activeTarget != targets[i]
        && scrollTop >= offsets[i]
        && (!offsets[i + 1] || scrollTop <= offsets[i + 1])
        && this.activate(targets[i])
    }
  }
  ScrollSpy.prototype.activate = function (target) {
    this.activeTarget = target
    $(this.selector)
      .parentsUntil(this.options.target, '.active')
      .removeClass('active')
    var selector = this.selector +
        '[data-target="' + target + '"],' +
        this.selector + '[href="' + target + '"]'
    var active = $(selector)
      .parents('li')
      .addClass('active')
    if (active.parent('.dropdown-menu').length) {
      active = active
        .closest('li.dropdown')
        .addClass('active')
    }
    active.trigger('activate.bs.scrollspy')
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.scrollspy')
      var options = typeof option == 'object' && option
      if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }
  var old = $.fn.scrollspy
  $.fn.scrollspy             = Plugin
  $.fn.scrollspy.Constructor = ScrollSpy
  $.fn.scrollspy.noConflict = function () {
    $.fn.scrollspy = old
    return this
  }
  $(window).on('load.bs.scrollspy.data-api', function () {
    $('[data-spy="scroll"]').each(function () {
      var $spy = $(this)
      Plugin.call($spy, $spy.data())
    })
  })
}(jQuery);
+function ($) {
  'use strict';
  var Tab = function (element) {
    this.element = $(element)
  }
  Tab.VERSION = '3.2.0'
  Tab.prototype.show = function () {
    var $this    = this.element
    var $ul      = $this.closest('ul:not(.dropdown-menu)')
    var selector = $this.data('target')
    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }
    if ($this.parent('li').hasClass('active')) return
    var previous = $ul.find('.active:last a')[0]
    var e        = $.Event('show.bs.tab', {
      relatedTarget: previous
    })
    $this.trigger(e)
    if (e.isDefaultPrevented()) return
    var $target = $(selector)
    this.activate($this.closest('li'), $ul)
    this.activate($target, $target.parent(), function () {
      $this.trigger({
        type: 'shown.bs.tab',
        relatedTarget: previous
      })
    })
  }
  Tab.prototype.activate = function (element, container, callback) {
    var $active    = container.find('> .active')
    var transition = callback
      && $.support.transition
      && $active.hasClass('fade')
    function next() {
      $active
        .removeClass('active')
        .find('> .dropdown-menu > .active')
        .removeClass('active')
      element.addClass('active')
      if (transition) {
        element[0].offsetWidth // reflow for transition
        element.addClass('in')
      } else {
        element.removeClass('fade')
      }
      if (element.parent('.dropdown-menu')) {
        element.closest('li.dropdown').addClass('active')
      }
      callback && callback()
    }
    transition ?
      $active
        .one('bsTransitionEnd', next)
        .emulateTransitionEnd(150) :
      next()
    $active.removeClass('in')
  }
  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.tab')
      if (!data) $this.data('bs.tab', (data = new Tab(this)))
      if (typeof option == 'string') data[option]()
    })
  }
  var old = $.fn.tab
  $.fn.tab             = Plugin
  $.fn.tab.Constructor = Tab
  $.fn.tab.noConflict = function () {
    $.fn.tab = old
    return this
  }
  $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
    e.preventDefault()
    Plugin.call($(this), 'show')
  })
}(jQuery);
+function ($) {
  'use strict';
  var Affix = function (element, options) {
    this.options = $.extend({}, Affix.DEFAULTS, options)
    this.$target = $(this.options.target)
      .on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this))
      .on('click.bs.affix.data-api',  $.proxy(this.checkPositionWithEventLoop, this))
    this.$element     = $(element)
    this.affixed      =
    this.unpin        =
    this.pinnedOffset = null
    this.checkPosition()
  }
  Affix.VERSION  = '3.2.0'
  Affix.RESET    = 'affix affix-top affix-bottom'
  Affix.DEFAULTS = {
    offset: 0,
    target: window
  }
  Affix.prototype.getPinnedOffset = function () {
    if (this.pinnedOffset) return this.pinnedOffset
    this.$element.removeClass(Affix.RESET).addClass('affix')
    var scrollTop = this.$target.scrollTop()
    var position  = this.$element.offset()
    return (this.pinnedOffset = position.top - scrollTop)
  }
  Affix.prototype.checkPositionWithEventLoop = function () {
    setTimeout($.proxy(this.checkPosition, this), 1)
  }
  Affix.prototype.checkPosition = function () {
    if (!this.$element.is(':visible')) return
    var scrollHeight = $(document).height()
    var scrollTop    = this.$target.scrollTop()
    var position     = this.$element.offset()
    var offset       = this.options.offset
    var offsetTop    = offset.top
    var offsetBottom = offset.bottom
    if (typeof offset != 'object')         offsetBottom = offsetTop = offset
    if (typeof offsetTop == 'function')    offsetTop    = offset.top(this.$element)
    if (typeof offsetBottom == 'function') offsetBottom = offset.bottom(this.$element)
    var affix = this.unpin   != null && (scrollTop + this.unpin <= position.top) ? false :
                offsetBottom != null && (position.top + this.$element.height() >= scrollHeight - offsetBottom) ? 'bottom' :
                offsetTop    != null && (scrollTop <= offsetTop) ? 'top' : false
    if (this.affixed === affix) return
    if (this.unpin != null) this.$element.css('top', '')
    var affixType = 'affix' + (affix ? '-' + affix : '')
    var e         = $.Event(affixType + '.bs.affix')
    this.$element.trigger(e)
    if (e.isDefaultPrevented()) return
    this.affixed = affix
    this.unpin = affix == 'bottom' ? this.getPinnedOffset() : null
    this.$element
      .removeClass(Affix.RESET)
      .addClass(affixType)
      .trigger($.Event(affixType.replace('affix', 'affixed')))
    if (affix == 'bottom') {
      this.$element.offset({
        top: scrollHeight - this.$element.height() - offsetBottom
      })
    }
  }
  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.affix')
      var options = typeof option == 'object' && option
      if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }
  var old = $.fn.affix
  $.fn.affix             = Plugin
  $.fn.affix.Constructor = Affix
  $.fn.affix.noConflict = function () {
    $.fn.affix = old
    return this
  }
  $(window).on('load', function () {
    $('[data-spy="affix"]').each(function () {
      var $spy = $(this)
      var data = $spy.data()
      data.offset = data.offset || {}
      if (data.offsetBottom) data.offset.bottom = data.offsetBottom
      if (data.offsetTop)    data.offset.top    = data.offsetTop
      Plugin.call($spy, data)
    })
  })
}(jQuery);
function altera_modo_tipo_carrega_mensagens_chat(tipo_mensagem_chat_carregar){
endereco_script = pasta_acoes + "/altera_modo_tipo_carrega_mensagens_chat.php"; // endereco de script
$.post(endereco_script, {tipo_mensagem_chat_carregar: tipo_mensagem_chat_carregar}, function(retorno){
reseta_contador_avanco_chat(); // reseta contador de avanco de chat
carregar_chat_usuario(); // carrega o chat do usuario
document.getElementById("div_chat_usuarios_disponiveis").style.display = "inline"; // exibindo div
});
};
function atualizador_chat(){
carregar_mensagens_chat(); // carrega as mensagens do chat
atualizar_mensagem_respondida(); // atualizar mensagem respondida
};
function atualizador_chat_notificacoes(){
retorne_numero_novas_mensagens(); // retorna o numero de novas mensagens
chat_novas_mensagens(); // atualiza usuarios novas mensagens
atualizar_chat_usuarios_online(); // atualiza usuarios online
};
function atualizar_chat_usuarios_online(){
endereco_script = pasta_acoes + "/retorne_idamigos_online.php"; // endereco de script
$.post(endereco_script, {modo_usuarios: 1}, function(retorno){
var idusuarios = retorno.split(","); // separando id de usuarios
var contador = 0; // contador
for(contador == contador; contador <= idusuarios.length; contador++){
var idamigo = idusuarios[contador]; // id de usuario amigo
if(idamigo.length > 0){
if ($('#span_usuario_online_chat_' + idamigo).length > 0) {
document.getElementById("span_usuario_online_chat_" + idamigo).style.display = "inline"; // mensagem existe
};
};
};
});
$.post(endereco_script, {modo_usuarios: 2}, function(retorno){
var idusuarios = retorno.split(","); // separando id de usuarios
var contador = 0; // contador
for(contador == contador; contador <= idusuarios.length; contador++){
var idamigo = idusuarios[contador]; // id de usuario amigo
if(idamigo.length > 0){
if ($('#span_usuario_online_chat_' + idamigo).length > 0) {
document.getElementById("span_usuario_online_chat_" + idamigo).style.display = "none"; // mensagem existe
};
};
};
});
};
function atualizar_mensagem_respondida(){
endereco_script = pasta_acoes + "/retorne_mensagem_nova.php"; // endereco de script
if(idusuario_chat_utilizando_atual == null){
return false; // retorno falso
};
$.post(endereco_script, {idusuario: idusuario_chat_utilizando_atual}, function(retorno){
document.getElementById("span_campo_existe_nova_mensagem_" + idusuario_chat_utilizando_atual).innerHTML = retorno; // nao ha mensagem nova
});
};
function avancar_amigos_chat(modo_avanco){
switch(modo_avanco){
case 1:
contador_avanco_amigos_chat = contador_avanco_amigos_chat - 2; // retrocede
break;
case 2:
contador_avanco_amigos_chat = contador_avanco_amigos_chat + 1; // avanca
break;
};
if(contador_avanco_amigos_chat < 0){
contador_avanco_amigos_chat = 0; // zera contador
};
carrega_amigos_chat(); // carrega amigos
};
function beep_mensagem_nova_nao_respondida(){
arquivo_som = pasta_sons_sistema + "/mensagem_nao_lida.mp3"; // arquivo de som
codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto
document.getElementById("campo_beep_notificacoes_gerais").innerHTML = codigo_html_bruto; // retorno
};
function beep_nova_mensagem_chat(){
arquivo_som = pasta_sons_sistema + "/nova_mensagem.mp3"; // arquivo de som
codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto
document.getElementById("div_campo_troca_mensagens_chat").innerHTML = document.getElementById("div_campo_troca_mensagens_chat").innerHTML + codigo_html_bruto; // retorno
};
function carregar_chat_usuario(){
document.getElementById("div_chat_usuarios_disponiveis").style.display = "none"; // exibindo div
carrega_amigos_chat(); // carrega usuarios disponiveis
};
timer_atualizador_conversa = setInterval(function(){atualizador_chat()}, 1000); // timer atualizador
timer_chat_notificacoes = setInterval(function(){atualizador_chat_notificacoes()}, 5000); // timer atualizador
function carregar_mais_mensagens_chat_usuario(tipo_carrega){
var y = $("#div_campo_troca_mensagens_chat").scrollTop(); // posicao atual
if(tipo_carrega == 1){
$("#div_campo_troca_mensagens_chat").scrollTop(y + 50); // avanca em pixel
}else{
$("#div_campo_troca_mensagens_chat").scrollTop(y - 50); // avanca em pixel
};
};
var mensagens_antigas_chat = null; // mensagens antigas de chat 
function carregar_mensagens_chat(){
endereco_script = pasta_acoes + "/carregar_mensagens_chat.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
if(mensagens_antigas_chat != retorno && retorno.length > 0){
document.getElementById("div_campo_troca_mensagens_chat").innerHTML = retorno; // retorno
mensagens_antigas_chat = retorno; // atualiza mensagens antigas
$("#div_campo_troca_mensagens_chat").animate({ scrollTop: $("#div_campo_troca_mensagens_chat")[0].scrollHeight}, 1000); // desce ate o final da div
beep_nova_mensagem_chat(); // beep nova mensagem
};
});
};
function carregar_sessao_chat_anterior(){
endereco_script = pasta_acoes + "/carregar_sessao_chat_anterior.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
idusuario = retorno; // id de usuario
if(retorno.length > 0){
constroe_campo_conversa_chat(idusuario); // abre a janela de chat
};
});
};
var contador_avanco_amigos_chat = 0; // contador
function carrega_amigos_chat(){
endereco_script = pasta_acoes + "/carrega_amigos_chat.php"; // endereco de script
$.post(endereco_script, {numero_pagina: contador_avanco_amigos_chat}, function(retorno){
if(retorno.length == 0){
contador_avanco_amigos_chat = 0; // reseta contador de avanco de chat
carrega_amigos_chat(); // carrega usuarios novamente
};
document.getElementById("div_lista_amigos_chat_usuario").innerHTML = retorno; // retorno
});
};
function chat_novas_mensagens(){
endereco_script = pasta_acoes + "/chat_novas_mensagens.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
var idusuarios = retorno.split(","); // separando id de usuarios
var contador = 0; // contador
for(contador == contador; contador <= idusuarios.length; contador++){
var idamigo = idusuarios[contador]; // id de usuario amigo
if(idamigo.length > 0){
document.getElementById("span_campo_existe_nova_mensagem_" + idamigo).innerHTML = 1; // mensagem existe
}else{
document.getElementById("span_campo_existe_nova_mensagem_" + idamigo).innerHTML = ""; // mensagem nao existe
};
};
});
};
function constroe_campo_conversa_chat(idusuario){
endereco_script = pasta_acoes + "/constroe_campo_conversa_chat.php"; // endereco de script
idusuario_chat_utilizando_atual = idusuario; // id de usuario utilizando
document.getElementById("div_chat_usuarios_disponiveis").style.display = "inline"; // exibe
$.post(endereco_script, {idusuario: idusuario}, function(retorno){
document.getElementById("div_lista_amigos_chat_usuario").innerHTML = retorno; // retorno
document.getElementById("campo_input_chat").focus(); // move o foco
});
};
function dialogo_excluir_todas_mensagens(){
$("html, body").animate({ scrollTop: 0 }, 1000); // topo da pagina
if(document.getElementById("div_excluir_todas_mensagens_usuario").style.display == "inline"){
document.getElementById("div_excluir_todas_mensagens_usuario").style.display = "none"; // exibindo div
}else{
document.getElementById("div_excluir_todas_mensagens_usuario").style.display = "inline"; // exibindo div
};
};
function enviar_mensagem_chat(idusuario){
endereco_script = pasta_acoes + "/enviar_mensagem_chat.php"; // endereco de script
conteudo_mensagem_chat = document.getElementById("campo_input_chat").value; // obtem o conteudo da mensagem
idusuario_chat_utilizando_atual = idusuario; // id de usuario utilizando
if(conteudo_mensagem_chat.length == 0){
return false; // retorno falso
};
$.post(endereco_script, {conteudo_mensagem_chat: conteudo_mensagem_chat}, function(retorno){
document.getElementById("campo_input_chat").value = ""; // limpa campo de mensgem
document.getElementById("campo_input_chat").focus(); // move o foco
document.getElementById("span_campo_existe_nova_mensagem_" + idusuario).innerHTML = ""; // limpa campo informa nova mensagem
});
oculta_campo_emoticons_enviar_mensagem();
};
function excluir_conversa_chat(idusuario){
endereco_script = pasta_acoes + "/excluir_conversa_chat.php"; // endereco de script
$.post(endereco_script, {idusuario: idusuario}, function(retorno){
document.getElementById("campo_input_chat").focus(); // move o foco
});
};
function excluir_todas_mensagens_usuario(){
endereco_script = pasta_acoes + "/exclui_todas_mensagens_usuario.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
carrega_amigos_chat();
dialogo_excluir_todas_mensagens();
});
};
function limpa_sessao_anterior_chat(){
endereco_script = pasta_acoes + "/limpa_sessao_anterior_chat.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
});
};
function ocultar_chat_usuario(){
if(document.getElementById("div_chat_usuarios_disponiveis").style.display == "none"){
document.getElementById("div_chat_usuarios_disponiveis").style.display = "inline"; // exibe
}else{
document.getElementById("div_chat_usuarios_disponiveis").style.display = "none"; // oculta
};
};
function oculta_campo_emoticons_enviar_mensagem(){
exibindo_meme_emoticon = false; // nao pode exibir
document.getElementById("div_exibe_memes_emoticons").style.display = "none"; // oculta
document.getElementById("div_carregar_mais_memes_emoticons").style.display = "none"; // exibe
document.getElementById("div_campo_troca_mensagens_chat").style.display = "block"; // exibe
};
function reseta_contador_avanco_chat(){
contador_avanco_amigos_chat = 0; // resetando contador
document.getElementById("div_lista_amigos_chat_usuario").innerHTML = "";// limpa conteudo antigo
limpa_sessao_anterior_chat(); // limpa sessao antiga
};
var numero_novas_mensagens_nao_respondidas = 0; // numero de novas mensagens
function retorne_numero_novas_mensagens(){
endereco_script = pasta_acoes + "/retorne_numero_novas_mensagens.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
retorno = parseInt(retorno); // converte para numero
if(retorno != numero_novas_mensagens_nao_respondidas && retorno.length > 0){
if(retorno > numero_novas_mensagens_nao_respondidas){
beep_mensagem_nova_nao_respondida(); // beep nova mensagem
};
numero_novas_mensagens_nao_respondidas = retorno; // atualiza numero novas mensagens
};
document.getElementById("span_numero_novas_mensagens_chat_menu_modo_tipo").innerHTML = retorno; // retorno
document.getElementById("span_numero_novas_mensagens_chat_menu_modo_tipo_titulo").innerHTML = retorno; // retorno
document.getElementById("div_campo_ocultar_exibir_chat").innerHTML = retorno; // retorno
document.getElementById("span_link_perfil_num_mensagens").innerHTML = retorno; // retorno
});
};
var idusuario_chat_utilizando_atual; // id de usuario utilizando atual
function exibir_comentarios_postagem(id, tipo_comentario, tipo_pagina){
endereco_script = pasta_acoes + "/comentarios.php"; // endereco de script
numero_pagina = document.getElementById("span_conta_avanco_comentario_" + id + "_" + tipo_comentario).innerHTML; // contador de avanco
numero_pagina = parseInt(numero_pagina); // converte para inteiro
numero_pagina_atual = numero_pagina; // pagina atual
numero_pagina += numero_avancos_comentarios; // incrementa
document.getElementById("span_conta_avanco_comentario_" + id + "_" + tipo_comentario).innerHTML = numero_pagina; // atualiza contador na span
$.post(endereco_script, {id: id, tipo_comentario: tipo_comentario, numero_pagina: numero_pagina_atual, tipo_pagina: tipo_pagina}, function(retorno){
if(!retorno){
return false; // retorno falso
};
if(numero_pagina > numero_avancos_comentarios){
comentarios_atual = document.getElementById("div_comentarios_usuarios_exibir_" + id + "_" + tipo_comentario).innerHTML; // comentarios atual
document.getElementById("div_comentarios_usuarios_exibir_" + id + "_" + tipo_comentario).innerHTML = comentarios_atual + retorno; // aplica retorno
}else{
comentarios_atual = ""; // comentarios atual
document.getElementById("div_comentarios_usuarios_exibir_" + id + "_" + tipo_comentario).innerHTML = comentarios_atual + retorno; // aplica retorno
};
});
};
function publicar_comentario_publicacao(id, tipo_comentario, idusuario){
endereco_script = pasta_acoes + "/comentar.php"; // endereco de script
endereco_script_curtida = pasta_acoes + "/curtir.php"; // endereco de script
comentario = document.getElementById("campo_input_comentario_publicacao_" + id + "_" + tipo_comentario).value; // comentario
document.getElementById("campo_input_comentario_publicacao_" + id + "_" + tipo_comentario).value = ""; // limpa campo
document.getElementById("campo_input_comentario_publicacao_" + id + "_" + tipo_comentario).focus; // movendo o foco
$.post(endereco_script, {id: id, tipo_comentario: tipo_comentario, comentario: comentario, idusuario: idusuario}, function(retorno){
document.getElementById("campos_social_publicacoes_gerais_" + id + "_" + tipo_comentario).innerHTML = retorno; // aplica retorno
});
$.post(endereco_script_curtida, {id: id, tipo_comentario: tipo_comentario}, function(retorno){
document.getElementById("campos_social_publicacoes_gerais_" + id + "_" + tipo_curtida).innerHTML = retorno; // aplica retorno
});
};
function curtir_social_geral(id, tipo_curtida, id_real_curtida, idusuario){
endereco_script = pasta_acoes + "/curtir.php"; // endereco de script
div_id_1 = "campos_social_publicacoes_gerais_" + id + "_" + tipo_curtida; // id de div
div_id_2 = "id_div_comentario_" + id + "_" + tipo_curtida; // id de div
div_id_3 = "id_div_comentario_" + id_real_curtida + "_" + tipo_curtida; // id de div
$.post(endereco_script, {id: id, tipo_curtida: tipo_curtida, tipo_comentario: tipo_curtida, idusuario: idusuario}, function(retorno){
if($('#' + div_id_1).length > 0) { 
document.getElementById(div_id_1).innerHTML = retorno; // aplica retorno
};
});
$.post(endereco_script, {id: id_real_curtida, tipo_curtida: tipo_curtida, tipo_comentario: tipo_curtida, curtir_social: 1}, function(retorno){
if($('#' + div_id_2).length > 0) { 
document.getElementById(div_id_3).innerHTML = retorno; // aplica retorno
};
});
};
jQuery(document).ready(function() {
$(".various").fancybox({
'transitionIn'	: 'none',
'transitionOut'	: 'none'
});
});
$(document).ready(function(){
$(".fancybox").fancybox();
});
(function (window, document, $, undefined) {
	"use strict";
	var H = $("html"),
		W = $(window),
		D = $(document),
		F = $.fancybox = function () {
			F.open.apply( this, arguments );
		},
		IE =  navigator.userAgent.match(/msie/i),
		didUpdate	= null,
		isTouch		= document.createTouch !== undefined,
		isQuery	= function(obj) {
			return obj && obj.hasOwnProperty && obj instanceof $;
		},
		isString = function(str) {
			return str && $.type(str) === "string";
		},
		isPercentage = function(str) {
			return isString(str) && str.indexOf('%') > 0;
		},
		isScrollable = function(el) {
			return (el && !(el.style.overflow && el.style.overflow === 'hidden') && ((el.clientWidth && el.scrollWidth > el.clientWidth) || (el.clientHeight && el.scrollHeight > el.clientHeight)));
		},
		getScalar = function(orig, dim) {
			var value = parseInt(orig, 10) || 0;
			if (dim && isPercentage(orig)) {
				value = F.getViewport()[ dim ] / 100 * value;
			}
			return Math.ceil(value);
		},
		getValue = function(value, dim) {
			return getScalar(value, dim) + 'px';
		};
	$.extend(F, {
		version: '2.1.5',
		defaults: {
			padding : 15,
			margin  : 20,
			width     : 800,
			height    : 600,
			minWidth  : 100,
			minHeight : 100,
			maxWidth  : 9999,
			maxHeight : 9999,
			pixelRatio: 1, // Set to 2 for retina display support
			autoSize   : true,
			autoHeight : false,
			autoWidth  : false,
			autoResize  : true,
			autoCenter  : !isTouch,
			fitToView   : true,
			aspectRatio : false,
			topRatio    : 0.5,
			leftRatio   : 0.5,
			scrolling : 'auto', // 'auto', 'yes' or 'no'
			wrapCSS   : '',
			arrows     : true,
			closeBtn   : true,
			closeClick : false,
			nextClick  : false,
			mouseWheel : true,
			autoPlay   : false,
			playSpeed  : 3000,
			preload    : 3,
			modal      : false,
			loop       : true,
			ajax  : {
				dataType : 'html',
				headers  : { 'X-fancyBox': true }
			},
			iframe : {
				scrolling : 'auto',
				preload   : true
			},
			swf : {
				wmode: 'transparent',
				allowfullscreen   : 'true',
				allowscriptaccess : 'always'
			},
			keys  : {
				next : {
					13 : 'left', // enter
					34 : 'up',   // page down
					39 : 'left', // right arrow
					40 : 'up'    // down arrow
				},
				prev : {
					8  : 'right',  // backspace
					33 : 'down',   // page up
					37 : 'right',  // left arrow
					38 : 'down'    // up arrow
				},
				close  : [27], // escape key
				play   : [32], // space - start/stop slideshow
				toggle : [70]  // letter "f" - toggle fullscreen
			},
			direction : {
				next : 'left',
				prev : 'right'
			},
			scrollOutside  : true,
			index   : 0,
			type    : null,
			href    : null,
			content : null,
			title   : null,
			tpl: {
				wrap     : '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
				image    : '<img class="fancybox-image" src="{href}" alt="" />',
				iframe   : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (IE ? ' allowtransparency="true"' : '') + '></iframe>',
				error    : '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
				closeBtn : '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
				next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
				prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
			},
			openEffect  : 'fade', // 'elastic', 'fade' or 'none'
			openSpeed   : 250,
			openEasing  : 'swing',
			openOpacity : true,
			openMethod  : 'zoomIn',
			closeEffect  : 'fade', // 'elastic', 'fade' or 'none'
			closeSpeed   : 250,
			closeEasing  : 'swing',
			closeOpacity : true,
			closeMethod  : 'zoomOut',
			nextEffect : 'elastic', // 'elastic', 'fade' or 'none'
			nextSpeed  : 250,
			nextEasing : 'swing',
			nextMethod : 'changeIn',
			prevEffect : 'elastic', // 'elastic', 'fade' or 'none'
			prevSpeed  : 250,
			prevEasing : 'swing',
			prevMethod : 'changeOut',
			helpers : {
				overlay : true,
				title   : true
			},
			onCancel     : $.noop, // If canceling
			beforeLoad   : $.noop, // Before loading
			afterLoad    : $.noop, // After loading
			beforeShow   : $.noop, // Before changing in current item
			afterShow    : $.noop, // After opening
			beforeChange : $.noop, // Before changing gallery item
			beforeClose  : $.noop, // Before closing
			afterClose   : $.noop  // After closing
		},
		group    : {}, // Selected group
		opts     : {}, // Group options
		previous : null,  // Previous element
		coming   : null,  // Element being loaded
		current  : null,  // Currently loaded element
		isActive : false, // Is activated
		isOpen   : false, // Is currently open
		isOpened : false, // Have been fully opened at least once
		wrap  : null,
		skin  : null,
		outer : null,
		inner : null,
		player : {
			timer    : null,
			isActive : false
		},
		ajaxLoad   : null,
		imgPreload : null,
		transitions : {},
		helpers     : {},
		open: function (group, opts) {
			if (!group) {
				return;
			}
			if (!$.isPlainObject(opts)) {
				opts = {};
			}
			if (false === F.close(true)) {
				return;
			}
			if (!$.isArray(group)) {
				group = isQuery(group) ? $(group).get() : [group];
			}
			$.each(group, function(i, element) {
				var obj = {},
					href,
					title,
					content,
					type,
					rez,
					hrefParts,
					selector;
				if ($.type(element) === "object") {
					if (element.nodeType) {
						element = $(element);
					}
					if (isQuery(element)) {
						obj = {
							href    : element.data('fancybox-href') || element.attr('href'),
							title   : element.data('fancybox-title') || element.attr('title'),
							isDom   : true,
							element : element
						};
						if ($.metadata) {
							$.extend(true, obj, element.metadata());
						}
					} else {
						obj = element;
					}
				}
				href  = opts.href  || obj.href || (isString(element) ? element : null);
				title = opts.title !== undefined ? opts.title : obj.title || '';
				content = opts.content || obj.content;
				type    = content ? 'html' : (opts.type  || obj.type);
				if (!type && obj.isDom) {
					type = element.data('fancybox-type');
					if (!type) {
						rez  = element.prop('class').match(/fancybox\.(\w+)/);
						type = rez ? rez[1] : null;
					}
				}
				if (isString(href)) {
					if (!type) {
						if (F.isImage(href)) {
							type = 'image';
						} else if (F.isSWF(href)) {
							type = 'swf';
						} else if (href.charAt(0) === '#') {
							type = 'inline';
						} else if (isString(element)) {
							type    = 'html';
							content = element;
						}
					}
					if (type === 'ajax') {
						hrefParts = href.split(/\s+/, 2);
						href      = hrefParts.shift();
						selector  = hrefParts.shift();
					}
				}
				if (!content) {
					if (type === 'inline') {
						if (href) {
							content = $( isString(href) ? href.replace(/.*(?=#[^\s]+$)/, '') : href ); //strip for ie7
						} else if (obj.isDom) {
							content = element;
						}
					} else if (type === 'html') {
						content = href;
					} else if (!type && !href && obj.isDom) {
						type    = 'inline';
						content = element;
					}
				}
				$.extend(obj, {
					href     : href,
					type     : type,
					content  : content,
					title    : title,
					selector : selector
				});
				group[ i ] = obj;
			});
			F.opts = $.extend(true, {}, F.defaults, opts);
			if (opts.keys !== undefined) {
				F.opts.keys = opts.keys ? $.extend({}, F.defaults.keys, opts.keys) : false;
			}
			F.group = group;
			return F._start(F.opts.index);
		},
		cancel: function () {
			var coming = F.coming;
			if (!coming || false === F.trigger('onCancel')) {
				return;
			}
			F.hideLoading();
			if (F.ajaxLoad) {
				F.ajaxLoad.abort();
			}
			F.ajaxLoad = null;
			if (F.imgPreload) {
				F.imgPreload.onload = F.imgPreload.onerror = null;
			}
			if (coming.wrap) {
				coming.wrap.stop(true, true).trigger('onReset').remove();
			}
			F.coming = null;
			if (!F.current) {
				F._afterZoomOut( coming );
			}
		},
		close: function (event) {
			F.cancel();
			if (false === F.trigger('beforeClose')) {
				return;
			}
			F.unbindEvents();
			if (!F.isActive) {
				return;
			}
			if (!F.isOpen || event === true) {
				$('.fancybox-wrap').stop(true).trigger('onReset').remove();
				F._afterZoomOut();
			} else {
				F.isOpen = F.isOpened = false;
				F.isClosing = true;
				$('.fancybox-item, .fancybox-nav').remove();
				F.wrap.stop(true, true).removeClass('fancybox-opened');
				F.transitions[ F.current.closeMethod ]();
			}
		},
		play: function ( action ) {
			var clear = function () {
					clearTimeout(F.player.timer);
				},
				set = function () {
					clear();
					if (F.current && F.player.isActive) {
						F.player.timer = setTimeout(F.next, F.current.playSpeed);
					}
				},
				stop = function () {
					clear();
					D.unbind('.player');
					F.player.isActive = false;
					F.trigger('onPlayEnd');
				},
				start = function () {
					if (F.current && (F.current.loop || F.current.index < F.group.length - 1)) {
						F.player.isActive = true;
						D.bind({
							'onCancel.player beforeClose.player' : stop,
							'onUpdate.player'   : set,
							'beforeLoad.player' : clear
						});
						set();
						F.trigger('onPlayStart');
					}
				};
			if (action === true || (!F.player.isActive && action !== false)) {
				start();
			} else {
				stop();
			}
		},
		next: function ( direction ) {
			var current = F.current;
			if (current) {
				if (!isString(direction)) {
					direction = current.direction.next;
				}
				F.jumpto(current.index + 1, direction, 'next');
			}
		},
		prev: function ( direction ) {
			var current = F.current;
			if (current) {
				if (!isString(direction)) {
					direction = current.direction.prev;
				}
				F.jumpto(current.index - 1, direction, 'prev');
			}
		},
		jumpto: function ( index, direction, router ) {
			var current = F.current;
			if (!current) {
				return;
			}
			index = getScalar(index);
			F.direction = direction || current.direction[ (index >= current.index ? 'next' : 'prev') ];
			F.router    = router || 'jumpto';
			if (current.loop) {
				if (index < 0) {
					index = current.group.length + (index % current.group.length);
				}
				index = index % current.group.length;
			}
			if (current.group[ index ] !== undefined) {
				F.cancel();
				F._start(index);
			}
		},
		reposition: function (e, onlyAbsolute) {
			var current = F.current,
				wrap    = current ? current.wrap : null,
				pos;
			if (wrap) {
				pos = F._getPosition(onlyAbsolute);
				if (e && e.type === 'scroll') {
					delete pos.position;
					wrap.stop(true, true).animate(pos, 200);
				} else {
					wrap.css(pos);
					current.pos = $.extend({}, current.dim, pos);
				}
			}
		},
		update: function (e) {
			var type = (e && e.type),
				anyway = !type || type === 'orientationchange';
			if (anyway) {
				clearTimeout(didUpdate);
				didUpdate = null;
			}
			if (!F.isOpen || didUpdate) {
				return;
			}
			didUpdate = setTimeout(function() {
				var current = F.current;
				if (!current || F.isClosing) {
					return;
				}
				F.wrap.removeClass('fancybox-tmp');
				if (anyway || type === 'load' || (type === 'resize' && current.autoResize)) {
					F._setDimension();
				}
				if (!(type === 'scroll' && current.canShrink)) {
					F.reposition(e);
				}
				F.trigger('onUpdate');
				didUpdate = null;
			}, (anyway && !isTouch ? 0 : 300));
		},
		toggle: function ( action ) {
			if (F.isOpen) {
				F.current.fitToView = $.type(action) === "boolean" ? action : !F.current.fitToView;
				if (isTouch) {
					F.wrap.removeAttr('style').addClass('fancybox-tmp');
					F.trigger('onUpdate');
				}
				F.update();
			}
		},
		hideLoading: function () {
			D.unbind('.loading');
			$('#fancybox-loading').remove();
		},
		showLoading: function () {
			var el, viewport;
			F.hideLoading();
			el = $('<div id="fancybox-loading"><div></div></div>').click(F.cancel).appendTo('body');
			D.bind('keydown.loading', function(e) {
				if ((e.which || e.keyCode) === 27) {
					e.preventDefault();
					F.cancel();
				}
			});
			if (!F.defaults.fixed) {
				viewport = F.getViewport();
				el.css({
					position : 'absolute',
					top  : (viewport.h * 0.5) + viewport.y,
					left : (viewport.w * 0.5) + viewport.x
				});
			}
		},
		getViewport: function () {
			var locked = (F.current && F.current.locked) || false,
				rez    = {
					x: W.scrollLeft(),
					y: W.scrollTop()
				};
			if (locked) {
				rez.w = locked[0].clientWidth;
				rez.h = locked[0].clientHeight;
			} else {
				rez.w = isTouch && window.innerWidth  ? window.innerWidth  : W.width();
				rez.h = isTouch && window.innerHeight ? window.innerHeight : W.height();
			}
			return rez;
		},
		unbindEvents: function () {
			if (F.wrap && isQuery(F.wrap)) {
				F.wrap.unbind('.fb');
			}
			D.unbind('.fb');
			W.unbind('.fb');
		},
		bindEvents: function () {
			var current = F.current,
				keys;
			if (!current) {
				return;
			}
			W.bind('orientationchange.fb' + (isTouch ? '' : ' resize.fb') + (current.autoCenter && !current.locked ? ' scroll.fb' : ''), F.update);
			keys = current.keys;
			if (keys) {
				D.bind('keydown.fb', function (e) {
					var code   = e.which || e.keyCode,
						target = e.target || e.srcElement;
					if (code === 27 && F.coming) {
						return false;
					}
					if (!e.ctrlKey && !e.altKey && !e.shiftKey && !e.metaKey && !(target && (target.type || $(target).is('[contenteditable]')))) {
						$.each(keys, function(i, val) {
							if (current.group.length > 1 && val[ code ] !== undefined) {
								F[ i ]( val[ code ] );
								e.preventDefault();
								return false;
							}
							if ($.inArray(code, val) > -1) {
								F[ i ] ();
								e.preventDefault();
								return false;
							}
						});
					}
				});
			}
			if ($.fn.mousewheel && current.mouseWheel) {
				F.wrap.bind('mousewheel.fb', function (e, delta, deltaX, deltaY) {
					var target = e.target || null,
						parent = $(target),
						canScroll = false;
					while (parent.length) {
						if (canScroll || parent.is('.fancybox-skin') || parent.is('.fancybox-wrap')) {
							break;
						}
						canScroll = isScrollable( parent[0] );
						parent    = $(parent).parent();
					}
					if (delta !== 0 && !canScroll) {
						if (F.group.length > 1 && !current.canShrink) {
							if (deltaY > 0 || deltaX > 0) {
								F.prev( deltaY > 0 ? 'down' : 'left' );
							} else if (deltaY < 0 || deltaX < 0) {
								F.next( deltaY < 0 ? 'up' : 'right' );
							}
							e.preventDefault();
						}
					}
				});
			}
		},
		trigger: function (event, o) {
			var ret, obj = o || F.coming || F.current;
			if (!obj) {
				return;
			}
			if ($.isFunction( obj[event] )) {
				ret = obj[event].apply(obj, Array.prototype.slice.call(arguments, 1));
			}
			if (ret === false) {
				return false;
			}
			if (obj.helpers) {
				$.each(obj.helpers, function (helper, opts) {
					if (opts && F.helpers[helper] && $.isFunction(F.helpers[helper][event])) {
						F.helpers[helper][event]($.extend(true, {}, F.helpers[helper].defaults, opts), obj);
					}
				});
			}
			D.trigger(event);
		},
		isImage: function (str) {
			return isString(str) && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i);
		},
		isSWF: function (str) {
			return isString(str) && str.match(/\.(swf)((\?|#).*)?$/i);
		},
		_start: function (index) {
			var coming = {},
				obj,
				href,
				type,
				margin,
				padding;
			index = getScalar( index );
			obj   = F.group[ index ] || null;
			if (!obj) {
				return false;
			}
			coming = $.extend(true, {}, F.opts, obj);
			margin  = coming.margin;
			padding = coming.padding;
			if ($.type(margin) === 'number') {
				coming.margin = [margin, margin, margin, margin];
			}
			if ($.type(padding) === 'number') {
				coming.padding = [padding, padding, padding, padding];
			}
			if (coming.modal) {
				$.extend(true, coming, {
					closeBtn   : false,
					closeClick : false,
					nextClick  : false,
					arrows     : false,
					mouseWheel : false,
					keys       : null,
					helpers: {
						overlay : {
							closeClick : false
						}
					}
				});
			}
			if (coming.autoSize) {
				coming.autoWidth = coming.autoHeight = true;
			}
			if (coming.width === 'auto') {
				coming.autoWidth = true;
			}
			if (coming.height === 'auto') {
				coming.autoHeight = true;
			}
			coming.group  = F.group;
			coming.index  = index;
			F.coming = coming;
			if (false === F.trigger('beforeLoad')) {
				F.coming = null;
				return;
			}
			type = coming.type;
			href = coming.href;
			if (!type) {
				F.coming = null;
				if (F.current && F.router && F.router !== 'jumpto') {
					F.current.index = index;
					return F[ F.router ]( F.direction );
				}
				return false;
			}
			F.isActive = true;
			if (type === 'image' || type === 'swf') {
				coming.autoHeight = coming.autoWidth = false;
				coming.scrolling  = 'visible';
			}
			if (type === 'image') {
				coming.aspectRatio = true;
			}
			if (type === 'iframe' && isTouch) {
				coming.scrolling = 'scroll';
			}
			coming.wrap = $(coming.tpl.wrap).addClass('fancybox-' + (isTouch ? 'mobile' : 'desktop') + ' fancybox-type-' + type + ' fancybox-tmp ' + coming.wrapCSS).appendTo( coming.parent || 'body' );
			$.extend(coming, {
				skin  : $('.fancybox-skin',  coming.wrap),
				outer : $('.fancybox-outer', coming.wrap),
				inner : $('.fancybox-inner', coming.wrap)
			});
			$.each(["Top", "Right", "Bottom", "Left"], function(i, v) {
				coming.skin.css('padding' + v, getValue(coming.padding[ i ]));
			});
			F.trigger('onReady');
			if (type === 'inline' || type === 'html') {
				if (!coming.content || !coming.content.length) {
					return F._error( 'content' );
				}
			} else if (!href) {
				return F._error( 'href' );
			}
			if (type === 'image') {
				F._loadImage();
			} else if (type === 'ajax') {
				F._loadAjax();
			} else if (type === 'iframe') {
				F._loadIframe();
			} else {
				F._afterLoad();
			}
		},
		_error: function ( type ) {
			$.extend(F.coming, {
				type       : 'html',
				autoWidth  : true,
				autoHeight : true,
				minWidth   : 0,
				minHeight  : 0,
				scrolling  : 'no',
				hasError   : type,
				content    : F.coming.tpl.error
			});
			F._afterLoad();
		},
		_loadImage: function () {
			var img = F.imgPreload = new Image();
			img.onload = function () {
				this.onload = this.onerror = null;
				F.coming.width  = this.width / F.opts.pixelRatio;
				F.coming.height = this.height / F.opts.pixelRatio;
				F._afterLoad();
			};
			img.onerror = function () {
				this.onload = this.onerror = null;
				F._error( 'image' );
			};
			img.src = F.coming.href;
			if (img.complete !== true) {
				F.showLoading();
			}
		},
		_loadAjax: function () {
			var coming = F.coming;
			F.showLoading();
			F.ajaxLoad = $.ajax($.extend({}, coming.ajax, {
				url: coming.href,
				error: function (jqXHR, textStatus) {
					if (F.coming && textStatus !== 'abort') {
						F._error( 'ajax', jqXHR );
					} else {
						F.hideLoading();
					}
				},
				success: function (data, textStatus) {
					if (textStatus === 'success') {
						coming.content = data;
						F._afterLoad();
					}
				}
			}));
		},
		_loadIframe: function() {
			var coming = F.coming,
				iframe = $(coming.tpl.iframe.replace(/\{rnd\}/g, new Date().getTime()))
					.attr('scrolling', isTouch ? 'auto' : coming.iframe.scrolling)
					.attr('src', coming.href);
			$(coming.wrap).bind('onReset', function () {
				try {
					$(this).find('iframe').hide().attr('src', '//about:blank').end().empty();
				} catch (e) {}
			});
			if (coming.iframe.preload) {
				F.showLoading();
				iframe.one('load', function() {
					$(this).data('ready', 1);
					if (!isTouch) {
						$(this).bind('load.fb', F.update);
					}
					$(this).parents('.fancybox-wrap').width('100%').removeClass('fancybox-tmp').show();
					F._afterLoad();
				});
			}
			coming.content = iframe.appendTo( coming.inner );
			if (!coming.iframe.preload) {
				F._afterLoad();
			}
		},
		_preloadImages: function() {
			var group   = F.group,
				current = F.current,
				len     = group.length,
				cnt     = current.preload ? Math.min(current.preload, len - 1) : 0,
				item,
				i;
			for (i = 1; i <= cnt; i += 1) {
				item = group[ (current.index + i ) % len ];
				if (item.type === 'image' && item.href) {
					new Image().src = item.href;
				}
			}
		},
		_afterLoad: function () {
			var coming   = F.coming,
				previous = F.current,
				placeholder = 'fancybox-placeholder',
				current,
				content,
				type,
				scrolling,
				href,
				embed;
			F.hideLoading();
			if (!coming || F.isActive === false) {
				return;
			}
			if (false === F.trigger('afterLoad', coming, previous)) {
				coming.wrap.stop(true).trigger('onReset').remove();
				F.coming = null;
				return;
			}
			if (previous) {
				F.trigger('beforeChange', previous);
				previous.wrap.stop(true).removeClass('fancybox-opened')
					.find('.fancybox-item, .fancybox-nav')
					.remove();
			}
			F.unbindEvents();
			current   = coming;
			content   = coming.content;
			type      = coming.type;
			scrolling = coming.scrolling;
			$.extend(F, {
				wrap  : current.wrap,
				skin  : current.skin,
				outer : current.outer,
				inner : current.inner,
				current  : current,
				previous : previous
			});
			href = current.href;
			switch (type) {
				case 'inline':
				case 'ajax':
				case 'html':
					if (current.selector) {
						content = $('<div>').html(content).find(current.selector);
					} else if (isQuery(content)) {
						if (!content.data(placeholder)) {
							content.data(placeholder, $('<div class="' + placeholder + '"></div>').insertAfter( content ).hide() );
						}
						content = content.show().detach();
						current.wrap.bind('onReset', function () {
							if ($(this).find(content).length) {
								content.hide().replaceAll( content.data(placeholder) ).data(placeholder, false);
							}
						});
					}
				break;
				case 'image':
					content = current.tpl.image.replace('{href}', href);
				break;
				case 'swf':
					content = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + href + '"></param>';
					embed   = '';
					$.each(current.swf, function(name, val) {
						content += '<param name="' + name + '" value="' + val + '"></param>';
						embed   += ' ' + name + '="' + val + '"';
					});
					content += '<embed src="' + href + '" type="application/x-shockwave-flash" width="100%" height="100%"' + embed + '></embed></object>';
				break;
			}
			if (!(isQuery(content) && content.parent().is(current.inner))) {
				current.inner.append( content );
			}
			F.trigger('beforeShow');
			current.inner.css('overflow', scrolling === 'yes' ? 'scroll' : (scrolling === 'no' ? 'hidden' : scrolling));
			F._setDimension();
			F.reposition();
			F.isOpen = false;
			F.coming = null;
			F.bindEvents();
			if (!F.isOpened) {
				$('.fancybox-wrap').not( current.wrap ).stop(true).trigger('onReset').remove();
			} else if (previous.prevMethod) {
				F.transitions[ previous.prevMethod ]();
			}
			F.transitions[ F.isOpened ? current.nextMethod : current.openMethod ]();
			F._preloadImages();
		},
		_setDimension: function () {
			var viewport   = F.getViewport(),
				steps      = 0,
				canShrink  = false,
				canExpand  = false,
				wrap       = F.wrap,
				skin       = F.skin,
				inner      = F.inner,
				current    = F.current,
				width      = current.width,
				height     = current.height,
				minWidth   = current.minWidth,
				minHeight  = current.minHeight,
				maxWidth   = current.maxWidth,
				maxHeight  = current.maxHeight,
				scrolling  = current.scrolling,
				scrollOut  = current.scrollOutside ? current.scrollbarWidth : 0,
				margin     = current.margin,
				wMargin    = getScalar(margin[1] + margin[3]),
				hMargin    = getScalar(margin[0] + margin[2]),
				wPadding,
				hPadding,
				wSpace,
				hSpace,
				origWidth,
				origHeight,
				origMaxWidth,
				origMaxHeight,
				ratio,
				width_,
				height_,
				maxWidth_,
				maxHeight_,
				iframe,
				body;
			wrap.add(skin).add(inner).width('auto').height('auto').removeClass('fancybox-tmp');
			wPadding = getScalar(skin.outerWidth(true)  - skin.width());
			hPadding = getScalar(skin.outerHeight(true) - skin.height());
			wSpace = wMargin + wPadding;
			hSpace = hMargin + hPadding;
			origWidth  = isPercentage(width)  ? (viewport.w - wSpace) * getScalar(width)  / 100 : width;
			origHeight = isPercentage(height) ? (viewport.h - hSpace) * getScalar(height) / 100 : height;
			if (current.type === 'iframe') {
				iframe = current.content;
				if (current.autoHeight && iframe.data('ready') === 1) {
					try {
						if (iframe[0].contentWindow.document.location) {
							inner.width( origWidth ).height(9999);
							body = iframe.contents().find('body');
							if (scrollOut) {
								body.css('overflow-x', 'hidden');
							}
							origHeight = body.outerHeight(true);
						}
					} catch (e) {}
				}
			} else if (current.autoWidth || current.autoHeight) {
				inner.addClass( 'fancybox-tmp' );
				if (!current.autoWidth) {
					inner.width( origWidth );
				}
				if (!current.autoHeight) {
					inner.height( origHeight );
				}
				if (current.autoWidth) {
					origWidth = inner.width();
				}
				if (current.autoHeight) {
					origHeight = inner.height();
				}
				inner.removeClass( 'fancybox-tmp' );
			}
			width  = getScalar( origWidth );
			height = getScalar( origHeight );
			ratio  = origWidth / origHeight;
			minWidth  = getScalar(isPercentage(minWidth) ? getScalar(minWidth, 'w') - wSpace : minWidth);
			maxWidth  = getScalar(isPercentage(maxWidth) ? getScalar(maxWidth, 'w') - wSpace : maxWidth);
			minHeight = getScalar(isPercentage(minHeight) ? getScalar(minHeight, 'h') - hSpace : minHeight);
			maxHeight = getScalar(isPercentage(maxHeight) ? getScalar(maxHeight, 'h') - hSpace : maxHeight);
			origMaxWidth  = maxWidth;
			origMaxHeight = maxHeight;
			if (current.fitToView) {
				maxWidth  = Math.min(viewport.w - wSpace, maxWidth);
				maxHeight = Math.min(viewport.h - hSpace, maxHeight);
			}
			maxWidth_  = viewport.w - wMargin;
			maxHeight_ = viewport.h - hMargin;
			if (current.aspectRatio) {
				if (width > maxWidth) {
					width  = maxWidth;
					height = getScalar(width / ratio);
				}
				if (height > maxHeight) {
					height = maxHeight;
					width  = getScalar(height * ratio);
				}
				if (width < minWidth) {
					width  = minWidth;
					height = getScalar(width / ratio);
				}
				if (height < minHeight) {
					height = minHeight;
					width  = getScalar(height * ratio);
				}
			} else {
				width = Math.max(minWidth, Math.min(width, maxWidth));
				if (current.autoHeight && current.type !== 'iframe') {
					inner.width( width );
					height = inner.height();
				}
				height = Math.max(minHeight, Math.min(height, maxHeight));
			}
			if (current.fitToView) {
				inner.width( width ).height( height );
				wrap.width( width + wPadding );
				width_  = wrap.width();
				height_ = wrap.height();
				if (current.aspectRatio) {
					while ((width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight) {
						if (steps++ > 19) {
							break;
						}
						height = Math.max(minHeight, Math.min(maxHeight, height - 10));
						width  = getScalar(height * ratio);
						if (width < minWidth) {
							width  = minWidth;
							height = getScalar(width / ratio);
						}
						if (width > maxWidth) {
							width  = maxWidth;
							height = getScalar(width / ratio);
						}
						inner.width( width ).height( height );
						wrap.width( width + wPadding );
						width_  = wrap.width();
						height_ = wrap.height();
					}
				} else {
					width  = Math.max(minWidth,  Math.min(width,  width  - (width_  - maxWidth_)));
					height = Math.max(minHeight, Math.min(height, height - (height_ - maxHeight_)));
				}
			}
			if (scrollOut && scrolling === 'auto' && height < origHeight && (width + wPadding + scrollOut) < maxWidth_) {
				width += scrollOut;
			}
			inner.width( width ).height( height );
			wrap.width( width + wPadding );
			width_  = wrap.width();
			height_ = wrap.height();
			canShrink = (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight;
			canExpand = current.aspectRatio ? (width < origMaxWidth && height < origMaxHeight && width < origWidth && height < origHeight) : ((width < origMaxWidth || height < origMaxHeight) && (width < origWidth || height < origHeight));
			$.extend(current, {
				dim : {
					width	: getValue( width_ ),
					height	: getValue( height_ )
				},
				origWidth  : origWidth,
				origHeight : origHeight,
				canShrink  : canShrink,
				canExpand  : canExpand,
				wPadding   : wPadding,
				hPadding   : hPadding,
				wrapSpace  : height_ - skin.outerHeight(true),
				skinSpace  : skin.height() - height
			});
			if (!iframe && current.autoHeight && height > minHeight && height < maxHeight && !canExpand) {
				inner.height('auto');
			}
		},
		_getPosition: function (onlyAbsolute) {
			var current  = F.current,
				viewport = F.getViewport(),
				margin   = current.margin,
				width    = F.wrap.width()  + margin[1] + margin[3],
				height   = F.wrap.height() + margin[0] + margin[2],
				rez      = {
					position: 'absolute',
					top  : margin[0],
					left : margin[3]
				};
			if (current.autoCenter && current.fixed && !onlyAbsolute && height <= viewport.h && width <= viewport.w) {
				rez.position = 'fixed';
			} else if (!current.locked) {
				rez.top  += viewport.y;
				rez.left += viewport.x;
			}
			rez.top  = getValue(Math.max(rez.top,  rez.top  + ((viewport.h - height) * current.topRatio)));
			rez.left = getValue(Math.max(rez.left, rez.left + ((viewport.w - width)  * current.leftRatio)));
			return rez;
		},
		_afterZoomIn: function () {
			var current = F.current;
			if (!current) {
				return;
			}
			F.isOpen = F.isOpened = true;
			F.wrap.css('overflow', 'visible').addClass('fancybox-opened');
			F.update();
			if ( current.closeClick || (current.nextClick && F.group.length > 1) ) {
				F.inner.css('cursor', 'pointer').bind('click.fb', function(e) {
					if (!$(e.target).is('a') && !$(e.target).parent().is('a')) {
						e.preventDefault();
						F[ current.closeClick ? 'close' : 'next' ]();
					}
				});
			}
			if (current.closeBtn) {
				$(current.tpl.closeBtn).appendTo(F.skin).bind('click.fb', function(e) {
					e.preventDefault();
					F.close();
				});
			}
			if (current.arrows && F.group.length > 1) {
				if (current.loop || current.index > 0) {
					$(current.tpl.prev).appendTo(F.outer).bind('click.fb', F.prev);
				}
				if (current.loop || current.index < F.group.length - 1) {
					$(current.tpl.next).appendTo(F.outer).bind('click.fb', F.next);
				}
			}
			F.trigger('afterShow');
			if (!current.loop && current.index === current.group.length - 1) {
				F.play( false );
			} else if (F.opts.autoPlay && !F.player.isActive) {
				F.opts.autoPlay = false;
				F.play();
			}
		},
		_afterZoomOut: function ( obj ) {
			obj = obj || F.current;
			$('.fancybox-wrap').trigger('onReset').remove();
			$.extend(F, {
				group  : {},
				opts   : {},
				router : false,
				current   : null,
				isActive  : false,
				isOpened  : false,
				isOpen    : false,
				isClosing : false,
				wrap   : null,
				skin   : null,
				outer  : null,
				inner  : null
			});
			F.trigger('afterClose', obj);
		}
	});
	F.transitions = {
		getOrigPosition: function () {
			var current  = F.current,
				element  = current.element,
				orig     = current.orig,
				pos      = {},
				width    = 50,
				height   = 50,
				hPadding = current.hPadding,
				wPadding = current.wPadding,
				viewport = F.getViewport();
			if (!orig && current.isDom && element.is(':visible')) {
				orig = element.find('img:first');
				if (!orig.length) {
					orig = element;
				}
			}
			if (isQuery(orig)) {
				pos = orig.offset();
				if (orig.is('img')) {
					width  = orig.outerWidth();
					height = orig.outerHeight();
				}
			} else {
				pos.top  = viewport.y + (viewport.h - height) * current.topRatio;
				pos.left = viewport.x + (viewport.w - width)  * current.leftRatio;
			}
			if (F.wrap.css('position') === 'fixed' || current.locked) {
				pos.top  -= viewport.y;
				pos.left -= viewport.x;
			}
			pos = {
				top     : getValue(pos.top  - hPadding * current.topRatio),
				left    : getValue(pos.left - wPadding * current.leftRatio),
				width   : getValue(width  + wPadding),
				height  : getValue(height + hPadding)
			};
			return pos;
		},
		step: function (now, fx) {
			var ratio,
				padding,
				value,
				prop       = fx.prop,
				current    = F.current,
				wrapSpace  = current.wrapSpace,
				skinSpace  = current.skinSpace;
			if (prop === 'width' || prop === 'height') {
				ratio = fx.end === fx.start ? 1 : (now - fx.start) / (fx.end - fx.start);
				if (F.isClosing) {
					ratio = 1 - ratio;
				}
				padding = prop === 'width' ? current.wPadding : current.hPadding;
				value   = now - padding;
				F.skin[ prop ](  getScalar( prop === 'width' ?  value : value - (wrapSpace * ratio) ) );
				F.inner[ prop ]( getScalar( prop === 'width' ?  value : value - (wrapSpace * ratio) - (skinSpace * ratio) ) );
			}
		},
		zoomIn: function () {
			var current  = F.current,
				startPos = current.pos,
				effect   = current.openEffect,
				elastic  = effect === 'elastic',
				endPos   = $.extend({opacity : 1}, startPos);
			delete endPos.position;
			if (elastic) {
				startPos = this.getOrigPosition();
				if (current.openOpacity) {
					startPos.opacity = 0.1;
				}
			} else if (effect === 'fade') {
				startPos.opacity = 0.1;
			}
			F.wrap.css(startPos).animate(endPos, {
				duration : effect === 'none' ? 0 : current.openSpeed,
				easing   : current.openEasing,
				step     : elastic ? this.step : null,
				complete : F._afterZoomIn
			});
		},
		zoomOut: function () {
			var current  = F.current,
				effect   = current.closeEffect,
				elastic  = effect === 'elastic',
				endPos   = {opacity : 0.1};
			if (elastic) {
				endPos = this.getOrigPosition();
				if (current.closeOpacity) {
					endPos.opacity = 0.1;
				}
			}
			F.wrap.animate(endPos, {
				duration : effect === 'none' ? 0 : current.closeSpeed,
				easing   : current.closeEasing,
				step     : elastic ? this.step : null,
				complete : F._afterZoomOut
			});
		},
		changeIn: function () {
			var current   = F.current,
				effect    = current.nextEffect,
				startPos  = current.pos,
				endPos    = { opacity : 1 },
				direction = F.direction,
				distance  = 200,
				field;
			startPos.opacity = 0.1;
			if (effect === 'elastic') {
				field = direction === 'down' || direction === 'up' ? 'top' : 'left';
				if (direction === 'down' || direction === 'right') {
					startPos[ field ] = getValue(getScalar(startPos[ field ]) - distance);
					endPos[ field ]   = '+=' + distance + 'px';
				} else {
					startPos[ field ] = getValue(getScalar(startPos[ field ]) + distance);
					endPos[ field ]   = '-=' + distance + 'px';
				}
			}
			if (effect === 'none') {
				F._afterZoomIn();
			} else {
				F.wrap.css(startPos).animate(endPos, {
					duration : current.nextSpeed,
					easing   : current.nextEasing,
					complete : F._afterZoomIn
				});
			}
		},
		changeOut: function () {
			var previous  = F.previous,
				effect    = previous.prevEffect,
				endPos    = { opacity : 0.1 },
				direction = F.direction,
				distance  = 200;
			if (effect === 'elastic') {
				endPos[ direction === 'down' || direction === 'up' ? 'top' : 'left' ] = ( direction === 'up' || direction === 'left' ? '-' : '+' ) + '=' + distance + 'px';
			}
			previous.wrap.animate(endPos, {
				duration : effect === 'none' ? 0 : previous.prevSpeed,
				easing   : previous.prevEasing,
				complete : function () {
					$(this).trigger('onReset').remove();
				}
			});
		}
	};
	F.helpers.overlay = {
		defaults : {
			closeClick : true,      // if true, fancyBox will be closed when user clicks on the overlay
			speedOut   : 200,       // duration of fadeOut animation
			showEarly  : true,      // indicates if should be opened immediately or wait until the content is ready
			css        : {},        // custom CSS properties
			locked     : !isTouch,  // if true, the content will be locked into overlay
			fixed      : true       // if false, the overlay CSS position property will not be set to "fixed"
		},
		overlay : null,      // current handle
		fixed   : false,     // indicates if the overlay has position "fixed"
		el      : $('html'), // element that contains "the lock"
		create : function(opts) {
			opts = $.extend({}, this.defaults, opts);
			if (this.overlay) {
				this.close();
			}
			this.overlay = $('<div class="fancybox-overlay"></div>').appendTo( F.coming ? F.coming.parent : opts.parent );
			this.fixed   = false;
			if (opts.fixed && F.defaults.fixed) {
				this.overlay.addClass('fancybox-overlay-fixed');
				this.fixed = true;
			}
		},
		open : function(opts) {
			var that = this;
			opts = $.extend({}, this.defaults, opts);
			if (this.overlay) {
				this.overlay.unbind('.overlay').width('auto').height('auto');
			} else {
				this.create(opts);
			}
			if (!this.fixed) {
				W.bind('resize.overlay', $.proxy( this.update, this) );
				this.update();
			}
			if (opts.closeClick) {
				this.overlay.bind('click.overlay', function(e) {
					if ($(e.target).hasClass('fancybox-overlay')) {
						if (F.isActive) {
							F.close();
						} else {
							that.close();
						}
						return false;
					}
				});
			}
			this.overlay.css( opts.css ).show();
		},
		close : function() {
			var scrollV, scrollH;
			W.unbind('resize.overlay');
			if (this.el.hasClass('fancybox-lock')) {
				$('.fancybox-margin').removeClass('fancybox-margin');
				scrollV = W.scrollTop();
				scrollH = W.scrollLeft();
				this.el.removeClass('fancybox-lock');
				W.scrollTop( scrollV ).scrollLeft( scrollH );
			}
			$('.fancybox-overlay').remove().hide();
			$.extend(this, {
				overlay : null,
				fixed   : false
			});
		},
		update : function () {
			var width = '100%', offsetWidth;
			this.overlay.width(width).height('100%');
			if (IE) {
				offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth);
				if (D.width() > offsetWidth) {
					width = D.width();
				}
			} else if (D.width() > W.width()) {
				width = D.width();
			}
			this.overlay.width(width).height(D.height());
		},
		onReady : function (opts, obj) {
			var overlay = this.overlay;
			$('.fancybox-overlay').stop(true, true);
			if (!overlay) {
				this.create(opts);
			}
			if (opts.locked && this.fixed && obj.fixed) {
				if (!overlay) {
					this.margin = D.height() > W.height() ? $('html').css('margin-right').replace("px", "") : false;
				}
				obj.locked = this.overlay.append( obj.wrap );
				obj.fixed  = false;
			}
			if (opts.showEarly === true) {
				this.beforeShow.apply(this, arguments);
			}
		},
		beforeShow : function(opts, obj) {
			var scrollV, scrollH;
			if (obj.locked) {
				if (this.margin !== false) {
					$('*').filter(function(){
						return ($(this).css('position') === 'fixed' && !$(this).hasClass("fancybox-overlay") && !$(this).hasClass("fancybox-wrap") );
					}).addClass('fancybox-margin');
					this.el.addClass('fancybox-margin');
				}
				scrollV = W.scrollTop();
				scrollH = W.scrollLeft();
				this.el.addClass('fancybox-lock');
				W.scrollTop( scrollV ).scrollLeft( scrollH );
			}
			this.open(opts);
		},
		onUpdate : function() {
			if (!this.fixed) {
				this.update();
			}
		},
		afterClose: function (opts) {
			if (this.overlay && !F.coming) {
				this.overlay.fadeOut(opts.speedOut, $.proxy( this.close, this ));
			}
		}
	};
	F.helpers.title = {
		defaults : {
			type     : 'float', // 'float', 'inside', 'outside' or 'over',
			position : 'bottom' // 'top' or 'bottom'
		},
		beforeShow: function (opts) {
			var current = F.current,
				text    = current.title,
				type    = opts.type,
				title,
				target;
			if ($.isFunction(text)) {
				text = text.call(current.element, current);
			}
			if (!isString(text) || $.trim(text) === '') {
				return;
			}
			title = $('<div class="fancybox-title fancybox-title-' + type + '-wrap">' + text + '</div>');
			switch (type) {
				case 'inside':
					target = F.skin;
				break;
				case 'outside':
					target = F.wrap;
				break;
				case 'over':
					target = F.inner;
				break;
				default: // 'float'
					target = F.skin;
					title.appendTo('body');
					if (IE) {
						title.width( title.width() );
					}
					title.wrapInner('<span class="child"></span>');
					F.current.margin[2] += Math.abs( getScalar(title.css('margin-bottom')) );
				break;
			}
			title[ (opts.position === 'top' ? 'prependTo'  : 'appendTo') ](target);
		}
	};
	$.fn.fancybox = function (options) {
		var index,
			that     = $(this),
			selector = this.selector || '',
			run      = function(e) {
				var what = $(this).blur(), idx = index, relType, relVal;
				if (!(e.ctrlKey || e.altKey || e.shiftKey || e.metaKey) && !what.is('.fancybox-wrap')) {
					relType = options.groupAttr || 'data-fancybox-group';
					relVal  = what.attr(relType);
					if (!relVal) {
						relType = 'rel';
						relVal  = what.get(0)[ relType ];
					}
					if (relVal && relVal !== '' && relVal !== 'nofollow') {
						what = selector.length ? $(selector) : that;
						what = what.filter('[' + relType + '="' + relVal + '"]');
						idx  = what.index(this);
					}
					options.index = idx;
					if (F.open(what, options) !== false) {
						e.preventDefault();
					}
				}
			};
		options = options || {};
		index   = options.index || 0;
		if (!selector || options.live === false) {
			that.unbind('click.fb-start').bind('click.fb-start', run);
		} else {
			D.undelegate(selector, 'click.fb-start').delegate(selector + ":not('.fancybox-item, .fancybox-nav')", 'click.fb-start', run);
		}
		this.filter('[data-fancybox-start=1]').trigger('click');
		return this;
	};
	D.ready(function() {
		var w1, w2;
		if ( $.scrollbarWidth === undefined ) {
			$.scrollbarWidth = function() {
				var parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body'),
					child  = parent.children(),
					width  = child.innerWidth() - child.height( 99 ).innerWidth();
				parent.remove();
				return width;
			};
		}
		if ( $.support.fixedPosition === undefined ) {
			$.support.fixedPosition = (function() {
				var elem  = $('<div style="position:fixed;top:20px;"></div>').appendTo('body'),
					fixed = ( elem[0].offsetTop === 20 || elem[0].offsetTop === 15 );
				elem.remove();
				return fixed;
			}());
		}
		$.extend(F.defaults, {
			scrollbarWidth : $.scrollbarWidth(),
			fixed  : $.support.fixedPosition,
			parent : $('body')
		});
		w1 = $(window).width();
		H.addClass('fancybox-lock-test');
		w2 = $(window).width();
		H.removeClass('fancybox-lock-test');
		$("<style type='text/css'>.fancybox-margin{margin-right:" + (w2 - w1) + "px;}</style>").appendTo("head");
	});
}(window, document, jQuery));
(function(r,G,f,v){var J=f("html"),n=f(r),p=f(G),b=f.fancybox=function(){b.open.apply(this,arguments)},I=navigator.userAgent.match(/msie/i),B=null,s=G.createTouch!==v,t=function(a){return a&&a.hasOwnProperty&&a instanceof f},q=function(a){return a&&"string"===f.type(a)},E=function(a){return q(a)&&0<a.indexOf("%")},l=function(a,d){var e=parseInt(a,10)||0;d&&E(a)&&(e*=b.getViewport()[d]/100);return Math.ceil(e)},w=function(a,b){return l(a,b)+"px"};f.extend(b,{version:"2.1.5",defaults:{padding:15,margin:20,
width:800,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,pixelRatio:1,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!0,autoCenter:!s,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},
keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'+
(I?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",openOpacity:!0,
openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:!0,title:!0},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,
isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,d){if(a&&(f.isPlainObject(d)||(d={}),!1!==b.close(!0)))return f.isArray(a)||(a=t(a)?f(a).get():[a]),f.each(a,function(e,c){var k={},g,h,j,m,l;"object"===f.type(c)&&(c.nodeType&&(c=f(c)),t(c)?(k={href:c.data("fancybox-href")||c.attr("href"),title:c.data("fancybox-title")||c.attr("title"),isDom:!0,element:c},f.metadata&&f.extend(!0,k,
c.metadata())):k=c);g=d.href||k.href||(q(c)?c:null);h=d.title!==v?d.title:k.title||"";m=(j=d.content||k.content)?"html":d.type||k.type;!m&&k.isDom&&(m=c.data("fancybox-type"),m||(m=(m=c.prop("class").match(/fancybox\.(\w+)/))?m[1]:null));q(g)&&(m||(b.isImage(g)?m="image":b.isSWF(g)?m="swf":"#"===g.charAt(0)?m="inline":q(c)&&(m="html",j=c)),"ajax"===m&&(l=g.split(/\s+/,2),g=l.shift(),l=l.shift()));j||("inline"===m?g?j=f(q(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):k.isDom&&(j=c):"html"===m?j=g:!m&&(!g&&
k.isDom)&&(m="inline",j=c));f.extend(k,{href:g,type:m,content:j,title:h,selector:l});a[e]=k}),b.opts=f.extend(!0,{},b.defaults,d),d.keys!==v&&(b.opts.keys=d.keys?f.extend({},b.defaults.keys,d.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1!==b.trigger("onCancel")&&(b.hideLoading(),b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0,!0).trigger("onReset").remove(),b.coming=null,b.current||
b._afterZoomOut(a))},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),b.isActive&&(!b.isOpen||!0===a?(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut()):(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),b.transitions[b.current.closeMethod]())))},play:function(a){var d=function(){clearTimeout(b.player.timer)},e=function(){d();b.current&&b.player.isActive&&(b.player.timer=
setTimeout(b.next,b.current.playSpeed))},c=function(){d();p.unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};if(!0===a||!b.player.isActive&&!1!==a){if(b.current&&(b.current.loop||b.current.index<b.group.length-1))b.player.isActive=!0,p.bind({"onCancel.player beforeClose.player":c,"onUpdate.player":e,"beforeLoad.player":d}),e(),b.trigger("onPlayStart")}else c()},next:function(a){var d=b.current;d&&(q(a)||(a=d.direction.next),b.jumpto(d.index+1,a,"next"))},prev:function(a){var d=b.current;
d&&(q(a)||(a=d.direction.prev),b.jumpto(d.index-1,a,"prev"))},jumpto:function(a,d,e){var c=b.current;c&&(a=l(a),b.direction=d||c.direction[a>=c.index?"next":"prev"],b.router=e||"jumpto",c.loop&&(0>a&&(a=c.group.length+a%c.group.length),a%=c.group.length),c.group[a]!==v&&(b.cancel(),b._start(a)))},reposition:function(a,d){var e=b.current,c=e?e.wrap:null,k;c&&(k=b._getPosition(d),a&&"scroll"===a.type?(delete k.position,c.stop(!0,!0).animate(k,200)):(c.css(k),e.pos=f.extend({},e.dim,k)))},update:function(a){var d=
a&&a.type,e=!d||"orientationchange"===d;e&&(clearTimeout(B),B=null);b.isOpen&&!B&&(B=setTimeout(function(){var c=b.current;c&&!b.isClosing&&(b.wrap.removeClass("fancybox-tmp"),(e||"load"===d||"resize"===d&&c.autoResize)&&b._setDimension(),"scroll"===d&&c.canShrink||b.reposition(a),b.trigger("onUpdate"),B=null)},e&&!s?0:300))},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?a:!b.current.fitToView,s&&(b.wrap.removeAttr("style").addClass("fancybox-tmp"),b.trigger("onUpdate")),
b.update())},hideLoading:function(){p.unbind(".loading");f("#fancybox-loading").remove()},showLoading:function(){var a,d;b.hideLoading();a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");p.bind("keydown.loading",function(a){if(27===(a.which||a.keyCode))a.preventDefault(),b.cancel()});b.defaults.fixed||(d=b.getViewport(),a.css({position:"absolute",top:0.5*d.h+d.y,left:0.5*d.w+d.x}))},getViewport:function(){var a=b.current&&b.current.locked||!1,d={x:n.scrollLeft(),
y:n.scrollTop()};a?(d.w=a[0].clientWidth,d.h=a[0].clientHeight):(d.w=s&&r.innerWidth?r.innerWidth:n.width(),d.h=s&&r.innerHeight?r.innerHeight:n.height());return d},unbindEvents:function(){b.wrap&&t(b.wrap)&&b.wrap.unbind(".fb");p.unbind(".fb");n.unbind(".fb")},bindEvents:function(){var a=b.current,d;a&&(n.bind("orientationchange.fb"+(s?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(d=a.keys)&&p.bind("keydown.fb",function(e){var c=e.which||e.keyCode,k=e.target||e.srcElement;
if(27===c&&b.coming)return!1;!e.ctrlKey&&(!e.altKey&&!e.shiftKey&&!e.metaKey&&(!k||!k.type&&!f(k).is("[contenteditable]")))&&f.each(d,function(d,k){if(1<a.group.length&&k[c]!==v)return b[d](k[c]),e.preventDefault(),!1;if(-1<f.inArray(c,k))return b[d](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(d,c,k,g){for(var h=f(d.target||null),j=!1;h.length&&!j&&!h.is(".fancybox-skin")&&!h.is(".fancybox-wrap");)j=h[0]&&!(h[0].style.overflow&&"hidden"===h[0].style.overflow)&&
(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();if(0!==c&&!j&&1<b.group.length&&!a.canShrink){if(0<g||0<k)b.prev(0<g?"down":"left");else if(0>g||0>k)b.next(0>g?"up":"right");d.preventDefault()}}))},trigger:function(a,d){var e,c=d||b.coming||b.current;if(c){f.isFunction(c[a])&&(e=c[a].apply(c,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;c.helpers&&f.each(c.helpers,function(d,e){if(e&&b.helpers[d]&&f.isFunction(b.helpers[d][a]))b.helpers[d][a](f.extend(!0,
{},b.helpers[d].defaults,e),c)});p.trigger(a)}},isImage:function(a){return q(a)&&a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)},isSWF:function(a){return q(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var d={},e,c;a=l(a);e=b.group[a]||null;if(!e)return!1;d=f.extend(!0,{},b.opts,e);e=d.margin;c=d.padding;"number"===f.type(e)&&(d.margin=[e,e,e,e]);"number"===f.type(c)&&(d.padding=[c,c,c,c]);d.modal&&f.extend(!0,d,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,
mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});d.autoSize&&(d.autoWidth=d.autoHeight=!0);"auto"===d.width&&(d.autoWidth=!0);"auto"===d.height&&(d.autoHeight=!0);d.group=b.group;d.index=a;b.coming=d;if(!1===b.trigger("beforeLoad"))b.coming=null;else{c=d.type;e=d.href;if(!c)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===c||"swf"===c)d.autoHeight=d.autoWidth=!1,d.scrolling="visible";"image"===c&&(d.aspectRatio=
!0);"iframe"===c&&s&&(d.scrolling="scroll");d.wrap=f(d.tpl.wrap).addClass("fancybox-"+(s?"mobile":"desktop")+" fancybox-type-"+c+" fancybox-tmp "+d.wrapCSS).appendTo(d.parent||"body");f.extend(d,{skin:f(".fancybox-skin",d.wrap),outer:f(".fancybox-outer",d.wrap),inner:f(".fancybox-inner",d.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){d.skin.css("padding"+b,w(d.padding[a]))});b.trigger("onReady");if("inline"===c||"html"===c){if(!d.content||!d.content.length)return b._error("content")}else if(!e)return b._error("href");
"image"===c?b._loadImage():"ajax"===c?b._loadAjax():"iframe"===c?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=this.width/b.opts.pixelRatio;b.coming.height=this.height/b.opts.pixelRatio;b._afterLoad()};a.onerror=function(){this.onload=
this.onerror=null;b._error("image")};a.src=b.coming.href;!0!==a.complete&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(d,e){"success"===e&&(a.content=d,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,d=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",s?"auto":a.iframe.scrolling).attr("src",a.href);
f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),d.one("load",function(){f(this).data("ready",1);s||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=d.appendTo(a.inner);a.iframe.preload||b._afterLoad()},_preloadImages:function(){var a=b.group,d=b.current,e=a.length,c=d.preload?Math.min(d.preload,
e-1):0,f,g;for(g=1;g<=c;g+=1)f=a[(d.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,d=b.current,e,c,k,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,d))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{d&&(b.trigger("beforeChange",d),d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());b.unbindEvents();e=a.content;c=a.type;k=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,
outer:a.outer,inner:a.inner,current:a,previous:d});g=a.href;switch(c){case "inline":case "ajax":case "html":a.selector?e=f("<div>").html(e).find(a.selector):t(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",!1)}));break;case "image":e=a.tpl.image.replace("{href}",
g);break;case "swf":e='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e+='<param name="'+a+'" value="'+b+'"></param>';h+=" "+a+'="'+b+'"'}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}(!t(e)||!e.parent().is(a.inner))&&a.inner.append(e);b.trigger("beforeShow");a.inner.css("overflow","yes"===k?"scroll":
"no"===k?"hidden":k);b._setDimension();b.reposition();b.isOpen=!1;b.coming=null;b.bindEvents();if(b.isOpened){if(d.prevMethod)b.transitions[d.prevMethod]()}else f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),d=0,e=!1,c=!1,e=b.wrap,k=b.skin,g=b.inner,h=b.current,c=h.width,j=h.height,m=h.minWidth,u=h.minHeight,n=h.maxWidth,p=h.maxHeight,s=h.scrolling,q=h.scrollOutside?
h.scrollbarWidth:0,x=h.margin,y=l(x[1]+x[3]),r=l(x[0]+x[2]),v,z,t,C,A,F,B,D,H;e.add(k).add(g).width("auto").height("auto").removeClass("fancybox-tmp");x=l(k.outerWidth(!0)-k.width());v=l(k.outerHeight(!0)-k.height());z=y+x;t=r+v;C=E(c)?(a.w-z)*l(c)/100:c;A=E(j)?(a.h-t)*l(j)/100:j;if("iframe"===h.type){if(H=h.content,h.autoHeight&&1===H.data("ready"))try{H[0].contentWindow.document.location&&(g.width(C).height(9999),F=H.contents().find("body"),q&&F.css("overflow-x","hidden"),A=F.outerHeight(!0))}catch(G){}}else if(h.autoWidth||
h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(C),h.autoHeight||g.height(A),h.autoWidth&&(C=g.width()),h.autoHeight&&(A=g.height()),g.removeClass("fancybox-tmp");c=l(C);j=l(A);D=C/A;m=l(E(m)?l(m,"w")-z:m);n=l(E(n)?l(n,"w")-z:n);u=l(E(u)?l(u,"h")-t:u);p=l(E(p)?l(p,"h")-t:p);F=n;B=p;h.fitToView&&(n=Math.min(a.w-z,n),p=Math.min(a.h-t,p));z=a.w-y;r=a.h-r;h.aspectRatio?(c>n&&(c=n,j=l(c/D)),j>p&&(j=p,c=l(j*D)),c<m&&(c=m,j=l(c/D)),j<u&&(j=u,c=l(j*D))):(c=Math.max(m,Math.min(c,n)),h.autoHeight&&
"iframe"!==h.type&&(g.width(c),j=g.height()),j=Math.max(u,Math.min(j,p)));if(h.fitToView)if(g.width(c).height(j),e.width(c+x),a=e.width(),y=e.height(),h.aspectRatio)for(;(a>z||y>r)&&(c>m&&j>u)&&!(19<d++);)j=Math.max(u,Math.min(p,j-10)),c=l(j*D),c<m&&(c=m,j=l(c/D)),c>n&&(c=n,j=l(c/D)),g.width(c).height(j),e.width(c+x),a=e.width(),y=e.height();else c=Math.max(m,Math.min(c,c-(a-z))),j=Math.max(u,Math.min(j,j-(y-r)));q&&("auto"===s&&j<A&&c+x+q<z)&&(c+=q);g.width(c).height(j);e.width(c+x);a=e.width();
y=e.height();e=(a>z||y>r)&&c>m&&j>u;c=h.aspectRatio?c<F&&j<B&&c<C&&j<A:(c<F||j<B)&&(c<C||j<A);f.extend(h,{dim:{width:w(a),height:w(y)},origWidth:C,origHeight:A,canShrink:e,canExpand:c,wPadding:x,hPadding:v,wrapSpace:y-k.outerHeight(!0),skinSpace:k.height()-j});!H&&(h.autoHeight&&j>u&&j<p&&!c)&&g.height("auto")},_getPosition:function(a){var d=b.current,e=b.getViewport(),c=d.margin,f=b.wrap.width()+c[1]+c[3],g=b.wrap.height()+c[0]+c[2],c={position:"absolute",top:c[0],left:c[3]};d.autoCenter&&d.fixed&&
!a&&g<=e.h&&f<=e.w?c.position="fixed":d.locked||(c.top+=e.y,c.left+=e.x);c.top=w(Math.max(c.top,c.top+(e.h-g)*d.topRatio));c.left=w(Math.max(c.left,c.left+(e.w-f)*d.leftRatio));return c},_afterZoomIn:function(){var a=b.current;a&&(b.isOpen=b.isOpened=!0,b.wrap.css("overflow","visible").addClass("fancybox-opened"),b.update(),(a.closeClick||a.nextClick&&1<b.group.length)&&b.inner.css("cursor","pointer").bind("click.fb",function(d){!f(d.target).is("a")&&!f(d.target).parent().is("a")&&(d.preventDefault(),
b[a.closeClick?"close":"next"]())}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",function(a){a.preventDefault();b.close()}),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),!a.loop&&a.index===a.group.length-1?b.play(!1):b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play()))},_afterZoomOut:function(a){a=
a||b.current;f(".fancybox-wrap").trigger("onReset").remove();f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,d=a.element,e=a.orig,c={},f=50,g=50,h=a.hPadding,j=a.wPadding,m=b.getViewport();!e&&(a.isDom&&d.is(":visible"))&&(e=d.find("img:first"),e.length||(e=d));t(e)?(c=e.offset(),e.is("img")&&(f=e.outerWidth(),g=e.outerHeight())):
(c.top=m.y+(m.h-g)*a.topRatio,c.left=m.x+(m.w-f)*a.leftRatio);if("fixed"===b.wrap.css("position")||a.locked)c.top-=m.y,c.left-=m.x;return c={top:w(c.top-h*a.topRatio),left:w(c.left-j*a.leftRatio),width:w(f+j),height:w(g+h)}},step:function(a,d){var e,c,f=d.prop;c=b.current;var g=c.wrapSpace,h=c.skinSpace;if("width"===f||"height"===f)e=d.end===d.start?1:(a-d.start)/(d.end-d.start),b.isClosing&&(e=1-e),c="width"===f?c.wPadding:c.hPadding,c=a-c,b.skin[f](l("width"===f?c:c-g*e)),b.inner[f](l("width"===
f?c:c-g*e-h*e))},zoomIn:function(){var a=b.current,d=a.pos,e=a.openEffect,c="elastic"===e,k=f.extend({opacity:1},d);delete k.position;c?(d=this.getOrigPosition(),a.openOpacity&&(d.opacity=0.1)):"fade"===e&&(d.opacity=0.1);b.wrap.css(d).animate(k,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:c?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,d=a.closeEffect,e="elastic"===d,c={opacity:0.1};e&&(c=this.getOrigPosition(),a.closeOpacity&&(c.opacity=0.1));b.wrap.animate(c,
{duration:"none"===d?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,complete:b._afterZoomOut})},changeIn:function(){var a=b.current,d=a.nextEffect,e=a.pos,c={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===d&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=w(l(e[g])-200),c[g]="+=200px"):(e[g]=w(l(e[g])+200),c[g]="-=200px"));"none"===d?b._afterZoomIn():b.wrap.css(e).animate(c,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},changeOut:function(){var a=
b.previous,d=a.prevEffect,e={opacity:0.1},c=b.direction;"elastic"===d&&(e["down"===c||"up"===c?"top":"left"]=("up"===c||"left"===c?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===d?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={defaults:{closeClick:!0,speedOut:200,showEarly:!0,css:{},locked:!s,fixed:!0},overlay:null,fixed:!1,el:f("html"),create:function(a){a=f.extend({},this.defaults,a);this.overlay&&this.close();this.overlay=
f('<div class="fancybox-overlay"></div>').appendTo(b.coming?b.coming.parent:a.parent);this.fixed=!1;a.fixed&&b.defaults.fixed&&(this.overlay.addClass("fancybox-overlay-fixed"),this.fixed=!0)},open:function(a){var d=this;a=f.extend({},this.defaults,a);this.overlay?this.overlay.unbind(".overlay").width("auto").height("auto"):this.create(a);this.fixed||(n.bind("resize.overlay",f.proxy(this.update,this)),this.update());a.closeClick&&this.overlay.bind("click.overlay",function(a){if(f(a.target).hasClass("fancybox-overlay"))return b.isActive?
b.close():d.close(),!1});this.overlay.css(a.css).show()},close:function(){var a,b;n.unbind("resize.overlay");this.el.hasClass("fancybox-lock")&&(f(".fancybox-margin").removeClass("fancybox-margin"),a=n.scrollTop(),b=n.scrollLeft(),this.el.removeClass("fancybox-lock"),n.scrollTop(a).scrollLeft(b));f(".fancybox-overlay").remove().hide();f.extend(this,{overlay:null,fixed:!1})},update:function(){var a="100%",b;this.overlay.width(a).height("100%");I?(b=Math.max(G.documentElement.offsetWidth,G.body.offsetWidth),
p.width()>b&&(a=p.width())):p.width()>n.width()&&(a=p.width());this.overlay.width(a).height(p.height())},onReady:function(a,b){var e=this.overlay;f(".fancybox-overlay").stop(!0,!0);e||this.create(a);a.locked&&(this.fixed&&b.fixed)&&(e||(this.margin=p.height()>n.height()?f("html").css("margin-right").replace("px",""):!1),b.locked=this.overlay.append(b.wrap),b.fixed=!1);!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,b){var e,c;b.locked&&(!1!==this.margin&&(f("*").filter(function(){return"fixed"===
f(this).css("position")&&!f(this).hasClass("fancybox-overlay")&&!f(this).hasClass("fancybox-wrap")}).addClass("fancybox-margin"),this.el.addClass("fancybox-margin")),e=n.scrollTop(),c=n.scrollLeft(),this.el.addClass("fancybox-lock"),n.scrollTop(e).scrollLeft(c));this.open(a)},onUpdate:function(){this.fixed||this.update()},afterClose:function(a){this.overlay&&!b.coming&&this.overlay.fadeOut(a.speedOut,f.proxy(this.close,this))}};b.helpers.title={defaults:{type:"float",position:"bottom"},beforeShow:function(a){var d=
b.current,e=d.title,c=a.type;f.isFunction(e)&&(e=e.call(d.element,d));if(q(e)&&""!==f.trim(e)){d=f('<div class="fancybox-title fancybox-title-'+c+'-wrap">'+e+"</div>");switch(c){case "inside":c=b.skin;break;case "outside":c=b.wrap;break;case "over":c=b.inner;break;default:c=b.skin,d.appendTo("body"),I&&d.width(d.width()),d.wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(l(d.css("margin-bottom")))}d["top"===a.position?"prependTo":"appendTo"](c)}}};f.fn.fancybox=function(a){var d,
e=f(this),c=this.selector||"",k=function(g){var h=f(this).blur(),j=d,k,l;!g.ctrlKey&&(!g.altKey&&!g.shiftKey&&!g.metaKey)&&!h.is(".fancybox-wrap")&&(k=a.groupAttr||"data-fancybox-group",l=h.attr(k),l||(k="rel",l=h.get(0)[k]),l&&(""!==l&&"nofollow"!==l)&&(h=c.length?f(c):e,h=h.filter("["+k+'="'+l+'"]'),j=h.index(this)),a.index=j,!1!==b.open(h,a)&&g.preventDefault())};a=a||{};d=a.index||0;!c||!1===a.live?e.unbind("click.fb-start").bind("click.fb-start",k):p.undelegate(c,"click.fb-start").delegate(c+
":not('.fancybox-item, .fancybox-nav')","click.fb-start",k);this.filter("[data-fancybox-start=1]").trigger("click");return this};p.ready(function(){var a,d;f.scrollbarWidth===v&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});if(f.support.fixedPosition===v){a=f.support;d=f('<div style="position:fixed;top:20px;"></div>').appendTo("body");var e=20===
d[0].offsetTop||15===d[0].offsetTop;d.remove();a.fixedPosition=e}f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")});a=f(r).width();J.addClass("fancybox-lock-test");d=f(r).width();J.removeClass("fancybox-lock-test");f("<style type='text/css'>.fancybox-margin{margin-right:"+(d-a)+"px;}</style>").appendTo("head")})})(window,document,jQuery);
function atualizador_notificacoes(){
atualizar_tempo_conexao_usuario(); // atualiza tempo de conexao
carrega_numero_notificacoes(null); // carrega o numero de notificacoes
carrega_numero_notificacoes_add_amigos(5); // carrega o numero de notificacoes
};
timer_notificacao = setInterval(function(){atualizador_notificacoes()}, 15000); // timer atualizador
function parar_atualizador_notificacoes(){
clearInterval(timer_notificacao); // para se precisar
};
function atualizar_tempo_conexao_usuario(){
endereco_script = pasta_acoes + "/atualizar_tempo_conexao_usuario.php"; // endereco de script
$.post(endereco_script, {}, function(retorno){
});
};
function beep_notificacao(){
arquivo_som = pasta_sons_sistema + "/nova_notificacao.mp3"; // arquivo de som
codigo_html_bruto = "<audio src='" + arquivo_som + "' autoplay>"; // codigo html bruto
document.getElementById("campo_beep_notificacoes_gerais").innerHTML = codigo_html_bruto; // retorno
};
var numero_novas_notificacoes_gerais = 0; // numero notificacoes
function carrega_numero_notificacoes(tipo_notificacao){
endereco_script = pasta_acoes + "/carrega_numero_notificacoes.php"; // endereco de script
$.post(endereco_script, {tipo_notificacao: tipo_notificacao}, function(retorno){
retorno = parseInt(retorno); // converte para numero
if(retorno != numero_novas_notificacoes_gerais){
if(retorno > numero_novas_notificacoes_gerais){
beep_notificacao(); // beep notificacao
};
numero_novas_notificacoes_gerais = retorno; // numero notificacoes
};
document.getElementById("span_numero_notificacoes_usuario").innerHTML = retorno; // retorno
});
};
var numero_novas_notificacoes_add_amigos = 0; // numero notificacoes
function carrega_numero_notificacoes_add_amigos(tipo_notificacao){
endereco_script = pasta_acoes + "/carrega_numero_notificacoes.php"; // endereco de script
$.post(endereco_script, {tipo_notificacao: tipo_notificacao}, function(retorno){
retorno = parseInt(retorno); // converte para numero
if(retorno != numero_novas_notificacoes_add_amigos){
if(retorno > numero_novas_notificacoes_add_amigos){
beep_notificacao(); // beep notificacao
};
numero_novas_notificacoes_add_amigos = retorno; // numero notificacoes
};
document.getElementById("span_numero_notificacoes_amizade_usuario").innerHTML = retorno; // retorno
});
};
function aplica_resolucao(){
endereco_script = pasta_acoes + "/resolucao.php"; // endereco de script
var largura = window.screen.width;
$.post(endereco_script, {largura: largura}, function(retorno){
});
};
