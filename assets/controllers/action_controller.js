import {Controller} from '@hotwired/stimulus'
import {getComponent} from '@symfony/ux-live-component';

export default class extends Controller {
    async initialize() {
        this.component = await getComponent(this.element);

        this.component.on('loading.state:started', (component) => {
            this.closePopups();
        });
    }

    closePopups() {
        document.querySelectorAll('.app-popup.is-active').forEach(popup => {
            popup.classList.remove('is-active');
            popup.parentNode.classList.remove('active');
        });
        document.body.style.overflow = '';
    }
}
