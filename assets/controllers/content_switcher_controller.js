import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['content', 'link'];

    connect() {
        this.defaultTarget = 'details';
        this.transitionDuration = 0;
        this.showSection(this.defaultTarget);
    }

    switch(event) {
        event.preventDefault();

        const target = event.currentTarget.dataset.target;
        this.hideAllSections();
        setTimeout(() => {
            this.showSection(target);
        }, this.transitionDuration);
    }

    hideAllSections() {
        this.contentTargets.forEach(section => {
            section.classList.remove('active');
            setTimeout(() => {
                section.style.display = 'none';
            }, this.transitionDuration);
        });

        this.linkTargets.forEach(link => {
            link.classList.remove('active');
        });
    }

    showSection(target) {
        const targetSection = this.contentTargets.find(
            section => section.classList.contains(target)
        );
        const targetLink = this.linkTargets.find(
            link => link.dataset.target === target
        );

        if (targetSection) {
            targetSection.style.display = 'block';
            requestAnimationFrame(() => {
                targetSection.classList.add('active');
            });
        }

        if (targetLink) {
            targetLink.classList.add('active');
        }
    }
}
