import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["tooltip", "background"];

    open(event) {
        event.preventDefault();
        this.tooltipTarget.classList.add('is-active');
        document.body.style.overflow = 'hidden';
        if (document.body.querySelector('.sheet-footer')) {
            document.body.querySelector('.sheet-footer').style.zIndex = '-1';
        }
        if (document.body.querySelector('.screen-footer')) {
            document.body.querySelector('.screen-footer').style.zIndex = '-1';
        }
    }

    close(event) {
        if (event.target === this.backgroundTarget || event.target.closest('.tooltip-close')) {
            event.preventDefault();
            this.tooltipTarget.classList.remove('is-active');
            document.body.style.overflow = '';
            if (document.body.querySelector('.sheet-footer')) {
                document.body.querySelector('.sheet-footer').style.zIndex = 'initial';
            }
            if (document.body.querySelector('.screen-footer')) {
                document.body.querySelector('.screen-footer').style.zIndex = 'initial';
            }
        }
    }
}
