		//set up markers 
		var myMarkers = {"markers": [
				{"latitude": "39.901784", "longitude":"32.773737", "icon": "img/markerIcon.png"}
			]
		};
		
		//set up map options
		$("#map").mapmarker({
			zoom	: 17,
			center	: 'Odtü Bilgisayar Ve Öğretim Teknolojileri Eğitimi Bölümü',
			markers	: myMarkers,
			content: 'deneme'
		});

