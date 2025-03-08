import {Controller} from '@hotwired/stimulus'
import {getComponent} from '@symfony/ux-live-component';

export default class extends Controller {
    static values = {screenType: String};

    async initialize() {
        this.component = await getComponent(this.element);

        this.component.on('loading.state:started', (component) => {
            this.closePopups();
        });

        this.component.on('render:finished', (component) => {
            this.updateScreenType();
        });
    }

    updateScreenType(event) {
        if (this.screenTypeValue === 'combat' || this.screenTypeValue === 'trade') {
            this.observeMutations();
        }
    }

    stopObserving() {
        if (this.observer) {
            this.observer.disconnect();
        }
    }

    closePopups() {
        document.querySelectorAll('.app-popup.is-active').forEach(popup => {
            popup.classList.remove('is-active');
            popup.parentNode.classList.remove('active');
        });
        document.body.style.overflow = '';
    }

    observeMutations() {
        const targetNode = document.querySelector('.screen-footerbox')
        if (!targetNode) return;

        const config = {childList: true, subtree: true};

        const callback = (mutationsList) => {
            for (const mutation of mutationsList) {
                if (mutation.type === 'childList') {
                    this.scrollToBottom(targetNode);
                    break;
                }
            }
        };

        this.observer = new MutationObserver(callback);
        this.observer.observe(targetNode, config);
    }

    scrollToBottom(target) {
        if (!target) return;

        requestAnimationFrame(() => {
            setTimeout(() => {
                target.scrollTop = target.scrollHeight;
            }, 50);
        });
    }
}
