import {Controller} from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ["tooltip", "background"];

    open(event) {
        event.preventDefault();
        this.tooltipTarget.classList.add('is-active');
        document.body.style.overflow = 'hidden';
        if (document.body.querySelector('.app-close')) {
            document.body.querySelector('.app-close').style.display = 'none';
        }
        if (document.body.querySelector('.sheet-footer')) {
            document.body.querySelector('.sheet-footer').style.display = 'none';
        }

        if (this.tooltipTarget.classList.contains('info')) {
            setTimeout(() => {
                this.tooltipTarget.classList.remove('is-active');
                document.body.style.overflow = '';
                if (document.body.querySelector('.app-close')) {
                    document.body.querySelector('.app-close').style.display = 'initial';
                }
                if (document.body.querySelector('.sheet-footer')) {
                    document.body.querySelector('.sheet-footer').style.display = 'flex';
                }
            }, 5000)
        }
    }

    close(event) {
        if (event.target === this.backgroundTarget || event.target.closest('.tooltip-close')) {
            event.preventDefault();
            this.tooltipTarget.classList.remove('is-active');
            document.body.style.overflow = '';
            if (document.body.querySelector('.app-close')) {
                document.body.querySelector('.app-close').style.display = 'initial';
            }
            if (document.body.querySelector('.sheet-footer')) {
                document.body.querySelector('.sheet-footer').style.display = 'flex';
            }
        }
    }
}
