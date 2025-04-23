import {Controller} from '@hotwired/stimulus'

export default class extends Controller {
    connect() {
        this.scroll()

        this.observer = new MutationObserver(() => {
            this.scroll()
        })

        this.observer.observe(this.element, {
            childList: true,
            subtree: true,
            characterData: true,
        })
    }

    disconnect() {
        if (this.observer) {
            this.observer.disconnect()
        }
    }

    scroll() {
        requestAnimationFrame(() => {
            this.element.scrollTop = this.element.scrollHeight
        })
    }
}
