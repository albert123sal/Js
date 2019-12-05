

class Camara{

	constructor(videoNode){

		this.videoNode = videoNode;
		console.log('Camara Class init');
	}


	encender(){

		navigator.mediaDevices.getUserMedia({
			audio: false,
			video: { width: 300, height: 300}

		}).then( stream=> {

			this.videoNode.srcObject = stream;
			this.stream = stream;

		});
	}


	apagar(){

		this.videoNode.pause();
		if(this.stream){
		this.stream.getTracks()[0].stop();
		}
	}

	tomarFoto(){
		//crear un elemento canvas para guardar foto
		let canvas = document.create Element('canvas');

		//colocar dimensiones del canvas o video
		canvas.setAttribute('width', 300 );
		canvas.setAttribute('height', 300 );

		//pbtener el contexto del canvas
		let context = canvas.getContext('2d'); //simple imagen  

		//dibujar la imagen dentro del canvas	
		context.drawImage( this.videoNode, 0, 0, canvas.width, canvas.height);

		this.foto = context.canvas.toDataURL();

		//limpieza
		canvas = null;
		context = null;

		return this.foto; 
	}



}