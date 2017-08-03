
var handlers = {
    dragstart: function(ev) {
        ev.preventDefault();
        let id = ev.target.id;
        ev.dataTransfer.setData('text/plain', id);
        console.log(ev.dataTransfer);
        ev.dataTransfer.dropEffect = "copy";
        
    },
    // dropzone handlers
    dragover: function (ev){
        ev.preventDefault();
        var target = ev.target;
        ev.dataTransfer.dropEffect = "copy";
        console.log('dragover');
    },
    drop: function (ev) {
        ev.preventDefault();
        ev.dataTransfer.dropEffect = "copy";
        var data = ev.dataTransfer.getData('text');
        ev.target.appendChild(document.getElementById(data));
        // console.log('drop');
    }

}
var helpers = {
    makedraggrable: function(elem) {
        if (elem.length == undefined) 
        {
            elem.setAttribute('draggable', true);
        }
        else if (elem.length >= 1) 
        {
            for (var i=0; i < elem.length; i++) 
            {
                let item = elem[i];
                item.setAttribute('draggable', true);
            }
        }
        else {
            return false;
        }
    },
    makedropzone: function(elem) {
        elem.addEventListener('drop', handlers.drop);
        elem.addEventListener('dragover', handlers.dragover);
        // elem.addEventListener('dragover', handlers.dragover);
    }
}

var div = document.querySelectorAll(".img");
var drops = document.querySelectorAll(".dropZone");

helpers.makedraggrable(div);

drops.forEach(function(elem){
    elem.addEventListener('drop', handlers.drop);
    elem.addEventListener('dragover', handlers.dragover);
});




