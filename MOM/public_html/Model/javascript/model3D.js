
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var container, camera, camLight, scene, renderer;
    var mouseX = 0, mouseY = 0;
    var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight;
    var windowHalfX = window.innerWidth / 2, windowHalfY = window.innerHeight / 2;
    // Model file OBJ
    var file = '../Ressources/obj3D/MA5.obj';
    var textureFile = '../Ressources/obj3D/MA5_0.jpg';
    /*var file = '../Ressources/obj3D/LEV730.obj';
    var textureFile = '../Ressources/obj3D/LEV730.jpg';*/

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
            $('.container').hide();
            
            renderer = new THREE.WebGLRenderer( { alpha: true } ); // init like this
            renderer.setClearColor( 0xffffff, 0 ); // second param is opacity, 0 => transparent
            renderer.setPixelRatio( window.devicePixelRatio );
            renderer.setSize( SCREEN_WIDTH, SCREEN_HEIGHT );
            renderer.shadowMapEnabled = true;
            renderer.shadowMapType = THREE.PCFShadowMap;
            container.appendChild( renderer.domElement );

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
        scene = new THREE.Scene();
        switch (isTexture) {
            case true :
                intensiteLight = 7;
                
                // lumiere avec texture
                var ambient = new THREE.AmbientLight( 0x404040 , intensiteLight );
                scene.add( ambient );

                break;
            case false :
                intensiteLight = 0.5;
                
                // lumiere sans texture
                var ambient = new THREE.AmbientLight( 0x404040 , intensiteLight );
                scene.add( ambient );
                
                var directionalLight = new THREE.DirectionalLight( 0xffffff , intensiteLight );
                directionalLight.position.set( 0, 0, 1 );
                scene.add( directionalLight );
                var directionalLight = new THREE.DirectionalLight( 0xffffff , intensiteLight );
                directionalLight.position.set( 0, 0, -1 );
                scene.add( directionalLight );
                
                break;
        }

        var onProgress = function ( xhr ) {
            if ( xhr.lengthComputable ) {
                var percentComplete = xhr.loaded / xhr.total * 100;
                console.log( Math.round(percentComplete, 2) + '% downloaded' );
                document.getElementById('pourcent').innerHTML = Math.round(percentComplete, 2) + '% downloaded';
            }
        };
        var onError = function ( xhr ) {};
        
        // application des textures et du obj FILE
        var texture = new THREE.Texture();
        THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );
        var loader = new THREE.OBJLoader( manager );
        loader.load( file, function ( object ) {
            if (isTexture) {
                var loader = new THREE.ImageLoader( manager );
                loader.load( textureFile, function ( image ) {
                    texture.image = image;
                    texture.needsUpdate = true;
                });
                object.traverse( function ( child ) {
                    if ( child instanceof THREE.Mesh ) {
                        child.material.map = texture;
                    }
                });
            }
            var ratioRadian = 0.0174533;
            object.position.y = 0;
            object.position.x = 0;
            object.position.z = -200;
            object.rotation.x = -20*ratioRadian;
            object.rotation.y = 50*ratioRadian;
            object.rotation.z = 100*ratioRadian;
            scene.add( object );
        }, onProgress, onError );
        
        
        /*file = '../Ressources/obj3D/LEV730.obj';
        var onProgress = function ( xhr ) {
                        if ( xhr.lengthComputable ) {
                            var percentComplete = xhr.loaded / xhr.total * 100;
                            document.getElementById('pourcent').innerHTML = Math.round(percentComplete, 2) + '% downloaded';
                        }
                    };

                    var onError = function ( xhr ) {
                    };

                    THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );
var loader = new THREE.OBJLoader();
                    loader.load( file , function ( object ) {
scene.add( object )
}, onProgress, onError );*/



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
        $('.container').show();
    }
    function refreshLoaded() {
        $('.onepix-imgloader').show();
        $('.container').hide();
    }