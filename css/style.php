<style>
body {
	width: 100wh;
	height: 90vh;
	color: #fff;
	background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

h1,h6 {
	font-family: 'Open Sans';
	font-weight: 300;
	text-align: center;
	position: absolute;
	top: 45%;
	right: 0;
	left: 0;
}

.shake {
	animation: shake-animation 4.72s ease infinite;
	transform-origin: 50% 50%;
}
.element {
    margin: 0 auto;
    width: 150px;
    height: 150px;
    background: red;
}
@keyframes shake-animation {
        0% { transform:translate(0,0) }
    1.78571% { transform:translate(5px,0) }
    3.57143% { transform:translate(0,0) }
    5.35714% { transform:translate(5px,0) }
    7.14286% { transform:translate(0,0) }
    8.92857% { transform:translate(5px,0) }
    10.71429% { transform:translate(0,0) }
    100% { transform:translate(0,0) }
}

.backdrop {
    -moz-box-shadow: 0px 6px 5px #3b3b3b; 
    -webkit-box-shadow: 0px 6px 5px #3b3b3b; 
    box-shadow: 0px 0px 10px #3b3b3b; 
    -moz-border-radius:20px; 
    -webkit-border-radius:20px; 
    border-radius:20px;
	border: 1px solid white;
}

.linktree {
    width: 120px;
    height: 120px;
    background-image: url("https://i.imgur.com/oggcsIH.jpeg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
} 
  </style>