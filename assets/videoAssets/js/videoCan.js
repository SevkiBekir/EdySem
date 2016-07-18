/**
* Geliştirme süreci için jQuery kullanıp, stabile geçilince orjinallik için jQueryden kurtulma taraftarıyım
*/

/**
 * Asım Doğan NAMLI
 * asim.dogan.namli@gmail.com 
 * videoCan.js@2016
 * 
 * Bu script, sunucunun da desteğiyle, en ucuz ve güvenli video akışını sağlayacak,
 * 
 * Mantıkda ise, video parçalarını arkaplandaki video objelerine yüklemek ve süresi geleni 
 * canvas objesi üzerinde görüntülemek yatıyor
 * 
 * Bu işlemde ilk adım sunucudan bir sectionmap istemek, yani hangi parçanın hangi uzunlukta 
 * ve hangi sırada olduğunu öğrenmek, bunu sectionMap JSON string'i ile service.php'den çekiyoruz.
 * 
 * Buradaki en önemli nokta, linkSifrele methodunu kullandığımız için bize verilen linkin sunucu tarafından
 * bunun bir sectionMap isteği olduğunun anlaşılmasıdır
 * 
 * sectionMap gizli obje olarak gömülü de gelebilir ancak bu güvenlik açığı yaratacaktır, hatta map şifreli de gelmeli
 */

/**
 * The main class of video player, which provides securitely streaming 
 * 
 * @param {DOM:div} obj => the div tag which contains player elements
 */
function videoCan(obj){
    this.sections = [];
    
    this.obj = obj;
    
    
    
    /**
    * sectionMap is main variable on that app,
    * it contains length of video and section data
    * 
    * The structre is;
    * var sectionMap{
    *       duration: @total second in video,
    *       fps: @fps of the video
    *       check: @true @default is true, later it can be used as decryrpt pass,
    *       sections: [
    *                   1: {
    *                           id: @id,
    *                           url: @sectionUrl,
    *                           startFrame: @whenStarts,
    *                           length: @howMuchSecond,
    *                       },
    *                   2: {
    *                           id: @id,
    *                           url: @sectionUrl,
    *                           startFrame: @whenStarts,
    *                           length: @howMuchSecond,
    *                       }
    *               ]
    *   }
    */
    this.sectionMap = {length: -1, check: false, sections:[]}; 
    
    
    /**
    * sections var contains section() object with index id
    */
    var sections = {};
    
    
    /**
    * Is video playing or not
    */
    var state = false; 
    
    
    /**
    * Current section id
    */
    var current = 0; // Current section id
    
    
    /**
    * Access main class
    */
    var self = this;
    
    
    /**
    * Current frame
    */
    var currFrame = 0;
    
        
    /**
     * Total Frame 
     */
    var totalFrame = 0;
    

    /**
     * Fps of the video
     */
    var fps = 0;
    
    
    /**
     * Duration in seconds
     */ 
    var duration = 0;
    
    
    /**
     * Current second
     */
    var currSecond = 0;
    
    this.start = function(){
        /**
         * Starting with getting sectionMap
         */
        
        self.getSections() //After successful server contact, getSections will initialize video
    }
    
    this.init = function(){
        /**
        * Calculating seconds, frames
        */
        totalFrame = fps*duration;
        
        /**
         * Initializing video section operations
         */
        self.videoOp = new self.videoOp();
        self.videoOp.init(); 
        
        /**
         * Initializing video player
         */
        self.player = new self.player(); 
        self.player.init();
        
        self.player.render(); // Start canvas rendering
    }
    
    /**
     * Get sectionMap from server
     */
    this.getSections = function(){
        var url = obj.attr('src'); // there must be src='url' in obj, which will provide sectionMap; 
        if(url){
            console.log('Getting video information');
            
            //$.get(url, function(e){console.log(e)}).done(function(e){console.log(e)}).fail(function(e){console.log(e)}).error(function(e){console.log(e)});
            
            // Geting sectionMap through GET method

            $.get(url, function(map){
                if(map.check == true){ // if validated then...
                    
                    duration = map.duration;
                    fps = map.fps;
                    
                    sectionMap = map;
                    self.init();
                }
                else{
                    // that means, server send error report or link contains irrelevant data.
                    console.log(map); // for now, just log out map
                }
            },'json'); 
        }
    }   
    
    /**
     * Start processing...
     * Magic happens here
     */
    this.run = function(){
        currFrame++; // Counting current frame.  
        currSecond = currFrame / fps;
        
        if (currFrame > self.videoOp.endFrame){
            if(!self.videoOp.next()){
                state = false
                self.videoOp.pause();
            };
        }
        
        self.player.render();
        
        if (state){
            setTimeout(function () {
                self.run();
            }, (1000 / fps));
        }
    }
    
    /**
     * Main video view class, prepeares and manages video showing enviroment
     */
    this.player = function(){
        /**
        * Some DOM objects
        */
        var videoRegion, controlBar, stateButon, videoCtx;
        
        /**
        * Access player level
        */
        var selfObj;
        
        this.init = function(){
            videoRegion = obj.find("#videoReg");
            controlBar = obj.find("#controlBar");
            stateButon = obj.find("#stateBut");
            videoCtx = videoRegion[0].getContext("2d");
            
            /**
            * When statebuton pressed
            */
            stateButon.click(function(){
                if(state){
                    $(this).css("background-color", "red");
                    state = false;

                    self.videoOp.pause(); // Stop video
                }  
                else{
                    $(this).css("background-color", "green");
                    state = true;

                    self.videoOp.play(); // Play video
                }
            }); 
        }
        
        /**
         * draw video to canvas
         */
        this.render = function(){
            videoCtx.drawImage(self.videoOp.video , 0, 0, videoRegion[0].height, videoRegion[0].width);
            
            $("#framet").html("Frame: " + currFrame + '/' + totalFrame);
            $("#secondt").html("Second: " + currSecond + '/' + duration);
            $("#sectiont").html("Section: " + current + '/' + sections.length);
        }
    }
    
    
    /**
     * Basic object of application, it contains separate <video> object to provide frames of video, which will showed on canvas
     * that function provides basic operations like play, stop, seek on video object
     * 
     * @returns {DOMObject:video} Returns video object
     */
    this.sectionObj = function(){
        /**
        * Data of section
        */
        this.data = {id: -1, 
                     url: '', 
                     startFrame: -1,
                     length: -1,
                    }
        
        /**
         * Access sectionObj from inside
         */
        var obj = this;
        
        
        /**
        * Does video loaded?
        */
        this.loaded = false;
        
        
        /**
         * Global end frame of section 
         */
        this.endFrame = -1;
        
        /**
         * The video object of section
         */ 
        this.video;
        
        
        /**
         * Initializing video object
         */
        this.load = function(){
            obj.video = document.createElement('video');
            obj.video.src = obj.data.url;
            /**
            * Setting when section ends
            */
            obj.endFrame = obj.data.startFrame + (obj.data.length * fps);
            obj.loaded = true;
        }
        
        
        /**
         * For test
         */
        this.append = function(){
            obj.controls = true;
            $("body").append(obj.video);
        };
    
        
        /**
         * Plays the video
         */
        this.play = function(){
            obj.video.play();
            self.run();
        };
        
        /**
         * Enables seek to new second in the section
         * @param {[[Type]]} second [[Description]]
         */
        this.seekInSect = function(second){
           obj.currentTime = second; 
        }
        
        /**
         * Stops the video
         */
        this.pause = function(){
            obj.video.pause();
            self.run();
        };
        
        return (typeof this.video === "undefined" ? false : this.video);
    }
    
    
    
    /**
     * provides getting frame of section and some functions like play, stop
     * 
     * @param   {int|string} section The gets id of section or 'curr' command to procces current section.
     * @param   {object} obj enables work on selected section                          
     * @returns {object(section())}   [[Description]]
     */
    this.videoOp = function(){
        
        /**
         * Current playing section
         */
        var current = 0;
        
        
        
        /**
         * Access videoOp level
         */
        var selfObj = this;
        
        
        
        /**
         * Initalize sections
         * @returns {section} Returns first section;
         */
        this.init = function(){
            
            // initializing sections
            for(var i = 0; i < sectionMap.sections.length; i++){
                var sectn = new self.sectionObj(); // new section obj
                sectn.data = sectionMap.sections[i]; // setting obj data from $sectionMap
                
                self.sections.push(sectn); // pushing section
            }
            
            
            this.__proto__ = self.sections[0];
            
            self.sections[0].load();
            return self.sections[0];
        }
        
        /**
         * Enables seeking in whole video
         * @param {int} second, which second?
         */
        this.seek = function(second){
            
        }
        
        /**
         * Jumps to new section
         * @param {int} section the id of new section
         */
        this.jumpTo = function(section){
            this.__proto__ = self.sections[section];
        }
        
        this.next = function(){
            if (current != self.sections.length - 1){
                current++;
                var sectn = self.sections[current];
                if(!sectn.loaded){
                    sectn.load();
                    
                    this.__proto__ = sectn;
                    
                    sectn.play();
                }
                return true;
            }
            else{
                return false;
            }
        }
    }    
}

// return section ? section : false; dumpest way, not working :D



var player;

function basla(){ // dünya dönmeye buradan başlar...
    console.log("yeb here we go");
    var mainDiv = $("#video");

    player = new videoCan(mainDiv);
    player.start();
}