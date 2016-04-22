
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var container, camera, camLight, scene, renderer;
    var mouseX = 0, mouseY = 0;
    var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight;
    var windowHalfX = window.innerWidth / 2, windowHalfY = window.innerHeight / 2;
    // Model file OBJ
    var file = '../Ressources/obj3D/MA5.obj';
    var textureFile = '../Ressources/obj3D/MA5_0.jpg';

    var controls, intensiteLight;
    var raycaster = new THREE.Raycaster();
    var mouse = new THREE.Vector2(), offset = new THREE.Vector3(), INTERSECTED, SELECTED;

    var isTexture = true, isFisrtTime = true;

    init();
    animate();
    function init() {
        container = document.getElementById( 'container' );
        camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 5000 );
        camera.position.z = 600;

        //manager
        var manager = new THREE.LoadingManager();
        manager.onProgress = function (item, loaded, total) {
            console.log(item, loaded, total);
        };
        manager.onLoad = function () {
            console.log('all items loaded');
            allItemsLoaded();
        };
        manager.onError = function () {
            console.log('there has been an error');
        };

        //renderer = new THREE.WebGLRenderer();
        if (isFisrtTime) {
            renderer = new THREE.WebGLRenderer( { alpha: true } ); // init like this
            renderer.setClearColor( 0xffffff, 0 ); // second param is opacity, 0 => transparent
            renderer.setPixelRatio( window.devicePixelRatio );
            renderer.setSize( SCREEN_WIDTH, SCREEN_HEIGHT );
            container.appendChild( renderer.domElement );

            document.addEventListener( 'mousemove', onDocumentMouseMove, false );
            renderer.domElement.addEventListener( 'mousedown', onDocumentMouseDown, false );
            renderer.domElement.addEventListener( 'mouseup', onDocumentMouseUp, false );
            window.addEventListener( 'resize', onWindowResize, false );

            document.getElementById('texture').disabled = true;

            isFisrtTime = false;

            timerTask();
        } else {
            refreshLoaded();
        }

        // controls
        controls = new THREE.TrackballControls( camera );
        controls.rotateSpeed = 2.0;
        controls.zoomSpeed = 1.2;
        controls.panSpeed = 0.8;
        controls.noZoom = false;
        controls.noPan = false;
        controls.staticMoving = true;
        controls.dynamicDampingFactor = 0.3;

        // scene+light
        switch (isTexture) {
            case true :
                intensiteLight = 1;
                break;
            case false :
                intensiteLight = 0.5;
                break;
        }
        scene = new THREE.Scene();
        var ambient = new THREE.AmbientLight( 0x404040 );
        scene.add( ambient );
        var directionalLight = new THREE.DirectionalLight( /*0xffeedd*/0xffffff , intensiteLight );
        directionalLight.position.set( 0, 0, 1 );
        scene.add( directionalLight );
        var directionalLight = new THREE.DirectionalLight( 0xffffff , intensiteLight );
        directionalLight.position.set( 0, 0, -1 );
        scene.add( directionalLight );

        var onProgress = function ( xhr ) {
            if ( xhr.lengthComputable ) {
                var percentComplete = xhr.loaded / xhr.total * 100;
                console.log( Math.round(percentComplete, 2) + '% downloaded' );
                document.getElementById('pourcent').innerHTML = Math.round(percentComplete, 2) + '% downloaded';
            }
        };
        var onError = function ( xhr ) {};
        // application des textures
        var texture = new THREE.Texture();
        if (isTexture) {
            var loader = new THREE.ImageLoader( manager );
            loader.load( textureFile, function ( image ) {
                texture.image = image;
                texture.needsUpdate = true;
            });
            var loader = new THREE.OBJLoader( manager );
            loader.load( file, function ( object ) {
                object.traverse( function ( child ) {
                    if ( child instanceof THREE.Mesh ) {
                        child.material.map = texture;
                    }
                });
                object.position.y = 0;
                scene.add( object );
            }, onProgress, onError );
        }
        else {
            var loader = new THREE.OBJLoader( manager );
            loader.load( file, function ( object ) {
                object.position.y = 0;
                scene.add( object );
            }, onProgress, onError );
        }
    }
    function timerTask(){
        $(document).ready(function () {
            var cl = new CanvasLoader('loading');
            cl.setColor('#4f4f4f'); // default is '#000000'
            cl.setShape('spiral'); // default is 'oval'
            cl.setDiameter(63); // default is 40
            cl.setDensity(14); // default is 40
            cl.setRange(1.3); // default is 1.3
            cl.setSpeed(1); // default is 2
            cl.setFPS(20); // default is 24
            cl.show(); // Hidden by default
        });
    }
    function onWindowResize() {
        windowHalfX = window.innerWidth / 2;
        windowHalfY = window.innerHeight / 2;
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( window.innerWidth, window.innerHeight );
    }
    function onDocumentMouseMove( event ) {
        event.preventDefault();
        mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
        mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
        raycaster.setFromCamera( mouse, camera );
        if ( SELECTED ) {
            var intersects = raycaster.intersectObject( plane );
            if ( intersects.length > 0 ) {
                SELECTED.position.copy( intersects[ 0 ].point.sub( offset ) );
            }
            return;
        }
    }
    function onDocumentMouseDown( event ) {
        event.preventDefault();
        raycaster.setFromCamera( mouse, camera );
    }
    function onDocumentMouseUp( event ) {
        event.preventDefault();
        controls.enabled = true;
        if ( INTERSECTED ) {
            plane.position.copy( INTERSECTED.position );
            SELECTED = null;
        }
        container.style.cursor = 'auto';
    }
    function animate() {
        requestAnimationFrame( animate );
        render();
    }
    function render() {
        controls.update();
        renderer.render( scene, camera );
    }
    function setTexture() {
        for( var i = scene.children.length - 1; i >= 0; i--){
            obj = scene.children[i];
            scene.remove(obj);
        }
        isTexture = true;
        init();
        document.getElementById('texture').disabled = true;
        document.getElementById('uniforme').disabled = false;
    }
    function setUniforme() {
        for( var i = scene.children.length - 1; i >= 0; i--){
            obj = scene.children[i];
            scene.remove(obj);
        }
        isTexture = false;
        init();
        document.getElementById('uniforme').disabled = true;
        document.getElementById('texture').disabled = false;
    }
    function allItemsLoaded() {
        $('.onepix-imgloader').hide();
    }
    function refreshLoaded() {
        $('.onepix-imgloader').show();
    }
    function retour() {
        location.href = "./details.php";
    }