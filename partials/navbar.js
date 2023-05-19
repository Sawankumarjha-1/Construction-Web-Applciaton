 setInterval(() => {
                let nav = document.getElementById('nav');
                if (scrollY > 0) {
                    nav.style.background = "rgba(0,0,0,0.8)";
                    nav.style.boxShadow = "0px 4px 4px 0px rgba(0,0,0,0.2)";
                } else {
                    nav.style.background = "transparent";
                    nav.style.boxShadow = "0px 0px 0px 0px transparent";
                }

            }, 0);