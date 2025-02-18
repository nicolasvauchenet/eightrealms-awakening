import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["tooltip", "background"];

    open(event) {
        event.preventDefault();
        this.tooltipTarget.classList.add('is-active');
        document.body.style.overflow = 'hidden';
        if (document.body.querySelector('.back')) {
            document.body.querySelector('.back').style.display = 'none';
        }

        if (this.tooltipTarget.classList.contains('info')) {
            setTimeout(() => {
                this.tooltipTarget.classList.remove('is-active');
                document.body.style.overflow = '';
                if (document.body.querySelector('.back')) {
                    document.body.querySelector('.back').style.display = 'initial';
                }
            }, 5000)
        }
    }

    close(event) {
        if (event.target === this.backgroundTarget || event.target.closest('.tooltip-close')) {
            event.preventDefault();
            this.tooltipTarget.classList.remove('is-active');
            document.body.style.overflow = '';
            if (document.body.querySelector('.back')) {
                document.body.querySelector('.back').style.display = 'initial';
            }
        }
    }
}
