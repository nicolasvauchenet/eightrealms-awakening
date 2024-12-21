import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['content'];

    connect() {
        this.originalHTML = this.contentTarget.innerHTML.trim();
        this.contentTarget.innerHTML = '';
        this.typeSpeed = 50;

        this.tempContainer = document.createElement('div');
        this.tempContainer.innerHTML = this.originalHTML;

        this.nodeQueue = Array.from(this.tempContainer.childNodes);
        this.currentCharIndex = 0;

        this.processNextNode();
    }

    processNextNode() {
        if (this.nodeQueue.length === 0) {
            return;
        }

        const currentNode = this.nodeQueue.shift();

        if (currentNode.nodeType === Node.TEXT_NODE) {
            this.typeText(currentNode);
        } else if (currentNode.nodeType === Node.ELEMENT_NODE) {
            const clonedNode = currentNode.cloneNode(false);
            this.contentTarget.appendChild(clonedNode);
            this.nodeQueue = Array.from(currentNode.childNodes).concat(this.nodeQueue);
            this.currentParentNode = clonedNode;
            this.processNextNode();
        }
    }

    typeText(node) {
        const text = node.textContent;
        if (!this.currentParentNode) {
            this.currentParentNode = this.contentTarget;
        }

        if (this.currentCharIndex < text.length) {
            this.currentParentNode.textContent += text.charAt(this.currentCharIndex);
            this.currentCharIndex++;
            this.scrollToBottom();
            setTimeout(() => this.typeText(node), this.typeSpeed);
        } else {
            this.currentCharIndex = 0;
            this.processNextNode();
        }
    }

    scrollToBottom() {
        this.contentTarget.scrollTop = this.contentTarget.scrollHeight;
    }
}
