import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["popup"];

    connect() {
        document.addEventListener("click", this.closeOnOutsideClick.bind(this));
    }

    disconnect() {
        document.removeEventListener("click", this.closeOnOutsideClick.bind(this));
    }

    open(event) {
        event.preventDefault();
        event.stopPropagation();

        this.closeAllPopups();

        this.popupTarget.parentNode.classList.add('active');
        this.popupTarget.classList.add('is-active');
        document.body.style.overflow = 'hidden';

        const backElement = document.body.querySelector('.back');
        if (backElement) {
            backElement.style.display = 'none';
        }
    }

    closeAllPopups() {
        document.querySelectorAll('.app-popup.is-active').forEach(popup => {
            popup.parentNode.classList.remove('active');
            popup.classList.remove('is-active');
        });
    }

    closeOnOutsideClick(event) {
        if (!event.target.closest('.app-popup.is-active')) {
            this.closeAllPopups();
            document.body.style.overflow = '';
        }
    }
}
