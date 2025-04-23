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

        const clickedElement = event.currentTarget;
        const parentPopup = clickedElement.closest(".app-popup");
        const targetPopup = parentPopup?.querySelector(".app-popup.spellsbook");

        if (targetPopup) {
            targetPopup.classList.toggle('is-active');
            targetPopup.parentNode.classList.toggle('active');
            document.querySelector('.header-infos').classList.toggle('disabled');
        } else {
            if (this.popupTarget.classList.contains('is-active')) {
                this.popupTarget.classList.remove('is-active');
                this.popupTarget.parentNode.classList.remove('active');
            } else {
                this.closeAllPopups();
                this.popupTarget.classList.add('is-active');
                this.popupTarget.parentNode.classList.add('active');
            }
        }

        document.body.style.overflow = 'hidden';
    }

    closeOtherPopups(parentPopup) {
        document.querySelectorAll('.app-popup.is-active').forEach(popup => {
            if (popup !== parentPopup) {
                popup.classList.remove('is-active');
                popup.parentNode.classList.remove('active');
                document.querySelector('.header-infos').classList.remove('disabled');
            }
        });
    }

    closeAllPopups() {
        document.querySelectorAll('.app-popup.is-active').forEach(popup => {
            popup.classList.remove('is-active');
            popup.parentNode.classList.remove('active');
            document.querySelector('.header-infos').classList.remove('disabled');
        });
        document.body.style.overflow = '';
    }

    closeOnOutsideClick(event) {
        if (!event.target.closest('.app-popup.is-active')) {
            this.closeAllPopups();
        }
    }

    preventClose(event) {
        event.stopPropagation();
    }
}
