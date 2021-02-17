window.onload = function() {
    
    document.getElementById("play").onclick = function() {

        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext('2d');


            terrain = [
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10, 10, 10, 10, 10, 10, 10],
                [2, 2, 2, 2, 2, 2, 10, 10, 10, 10, 10, 10, 10, 10, 10],
                [2, 2, 2, 2, 2, 2, 10, 10, 10, 10, 10, 10, 10, 10, 10],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2],
                [2, 2, 2, 2, 2, 2, 10, 10, 10,  2,  2,  2,  2,  2,  2]
            ]

            y = -1

            terrain.forEach(ligne => {
                
                y +=1;
                i = -1;

                ligne.forEach(carre => {

                    i += 1;

                    if (carre == 2) {

                        ctx.fillStyle ='green'
                        ctx.fillRect(0+(i*50),0+(y*50),50,50)

                    }

                    if (carre == 10) {

                        ctx.fillStyle ='gray'
                        ctx.fillRect(0+(i*50),0+(y*50),50,50)

                    }

                    
                })
                
            });

    }

}