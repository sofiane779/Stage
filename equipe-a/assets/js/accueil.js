const txtAnim = document.querySelector('h1');

new Typewriter(txtAnim, {
    // deleteSpeed: 20
})
.typeString('moi c le top')
.pauseFor(300)
.typeString('<strong>, EA Boss </strong>')
.start()