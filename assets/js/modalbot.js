var Modalbot
(function(){
	"use strict"

	Modalbot = function(opts){
		this.options = {
			showHeader : true,
			showFooter : false,
			showClose : true,
			showSubmit : false,
			closeLabel : "Close",
			submitLabel : "Submit",
			closeable : true,
			hideEvent : function(e){},
			hiddenEvent : function(e){},
			submitEvent : function(e){},
			hideSubmit : false, 
			hiddenSubmit : false, 
			bodyHtml : "", 
			modalWidth : "normal",
			bClose : '<button type="button" class="btn btn-default" data-dismiss="modal"></button>',
			bSubmit : '<button type="button" class="btn btn-default" data-dismiss="modal"></button>',
			modalContainer : '<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>',
			modalDialog : '<div class="modal-dialog" role="document"></div>',
			modalContent : '<div class="modal-content"></div>',
			modalHeader : '<div class="modal-header"></div>',
			modalBody : '<div class="modal-body"></div>',
			modalFooter : '<div class="modal-footer"></div>',
			headerHtml : '<h4 class="modal-title">Modal title</h4>',
			headerClose : '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
		}

		this.elements = {
			modal : $(this.options.modalContainer),
			modalDialog : $(this.options.modalDialog),
			modalHeader : $(this.options.modalHeader),
			modalContent : $(this.options.modalContent),
			modalBody : $(this.options.modalBody),
			modalFooter : $(this.options.modalFooter),
			headerHtml : $(this.options.headerHtml),
			headerClose : $(this.options.headerClose),
			bClose : $(this.options.bClose),
			bSubmit : $(this.options.bSubmit),
		}

		$.extend(this.options,opts)
		this.generate()

	}

	function setEvent(el,opts){
		var hideEvent = function(e){
			el.modal.off('hide.bs.modal')
			opts.hideEvent(e)
		}

		var hiddenEvent = function(e){
			el.modal.off('hidden.bs.modal')
			opts.hiddenEvent(e)
		}

		var submitEvent = function(e){
			e.stopImmediatePropagation();
			if(!opts.hideSubmit) el.modal.off('hide.bs.modal',hideEvent)	
			if(!opts.hiddenSubmit) el.modal.off('hidden.bs.modal',hiddenEvent)
			$.when(opts.submitEvent(e)).done(el.modal.modal('hide'))
		}

		el.modal.on("hide.bs.modal",hideEvent)
		el.modal.on("hidden.bs.modal",hiddenEvent)
		el.bSubmit.bind("click",submitEvent)

		if(!opts.closeable){
			el.modal.off("hide.bs.modal")
			el.modal.on("hide.bs.modal",function(e){
				e.preventDefault()
			})
		}
	}

	Modalbot.prototype.generate = function(opts) {
		if(typeof opts !== "undefined") $.extend(this.options,opts);

		var contentEl = [],footerEl = []

		this.elements.modalDialog.attr("class","modal-dialog")

		if(this.options.modalWidth.match(/large/i)) this.elements.modalDialog.addClass("modal-lg")
		else if(this.options.modalWidth.match(/small/i)) this.elements.modalDialog.addClass("modal-sm")

		this.elements.modal.html(this.elements.modalDialog)
		this.elements.modalHeader.html(this.elements.headerClose,this.elements.headerHtml)	
		this.elements.modalDialog.html(this.elements.modalContent)

		if(this.options.showHeader) contentEl[0] = this.elements.modalHeader
		if(this.options.showFooter) contentEl[2] = this.elements.modalFooter
		contentEl[1] = this.elements.modalBody

		if(!this.options.showHeader && !this.options.showFooter) this.elements.modalBody.html(this.elements.headerClose)
		this.elements.modalBody.html(this.options.bodyHtml)
		this.elements.modalContent.html(contentEl)

		if(this.options.showClose) footerEl[0] = this.elements.bClose
		if(this.options.showSubmit) footerEl[1] = this.elements.bSubmit
		this.elements.modalFooter.html(footerEl)

		this.elements.bClose.html(this.options.closeLabel)
		this.elements.bSubmit.html(this.options.submitLabel)

		setEvent(this.elements,this.options)
		return this
	};

	Modalbot.prototype.show = function(body) {
		if(typeof body == "undefined") this.elements.modalBody.html(this.options.bodyHtml) 
		else this.elements.modalBody.html(body) 
		this.elements.modal.modal('show')
		return this
	}

	Modalbot.prototype.hide = function() {
		this.elements.modal('hide')
	}

	Modalbot.prototype.updateHandler = function() {
		this.elements.modal.modal('updateHandler')
		return this
	}

})()