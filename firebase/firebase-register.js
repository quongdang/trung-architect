
var config = {
	apiKey: "AIzaSyC2Mx12il_RIgmzMMPxacMK4KHdkUzsbxs",
	authDomain: "basp-push-notification.firebaseapp.com",
	databaseURL: "https://basp-push-notification.firebaseio.com",
	projectId: "basp-push-notification",
	storageBucket: "basp-push-notification.appspot.com",
	messagingSenderId: "412925397429"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
messaging.usePublicVapidKey('BGjLhNgNJ-JdQ4lM4eDo5LEfadt1N5JDxzRRttZFhouV83-nyktg2MQXX5vFDmsWkAS3KDawVIdOD9mQmEybNE4');

messaging.onTokenRefresh(function() {
    messaging.getToken().then(function(refreshedToken) {
      console.log('FIREBASE-REGISTER: Token refreshed.');
      this.sendTokenToTheServer(refreshedToken);
    }).catch(function(err) {
      console.log('FIREBASE-REGISTER: Unable to retrieve refreshed token ', err);
    });
});

if('serviceWorker' in navigator) {
	console.log('FIREBASE-REGISTER: Browser supports serviceWorker');
	navigator.serviceWorker.register('./firebase-messaging-sw.js')
	.then((registration) => {
		console.log('FIREBASE-REGISTER: Register serviceWorker success!!!');
		if (Notification.permission === 'denied') {
			console.log('REGISTER-PUSH: The user has blocked notifications.');
			return;
		}
		messaging.useServiceWorker(registration);
		this.requestPermission();
	});
} else {
	console.log('FIREBASE-REGISTER: Browser does not support serviceWorker');
}

function requestPermission() {
    console.log('FIREBASE-REGISTER: Requesting permission...');
    messaging.requestPermission().then(function() {
	  console.log('FIREBASE-REGISTER: Notification permission granted.');
	  this.getToken();
    }).catch(function(err) {
      console.log('FIREBASE-REGISTER: Unable to get permission to notify.', err);
    });
}

function getToken() {
	console.log('FIREBASE-REGISTER: Get token...');
	messaging.getToken().then(function(currentToken) {
		console.log('FIREBASE-REGISTER: Token ' + currentToken);
		if (currentToken) {
			console.log('FIREBASE-REGISTER: Generate token success!');
		  this.sendTokenToTheServer(currentToken);
		} else {
		  // Show permission request.
		  console.log('FIREBASE-REGISTER: No Instance ID token available. Request permission to generate one.');
		}
	  }).catch(function(err) {
		console.log('FIREBASE-REGISTER: An error occurred while retrieving token. ', err);
	});
}

function sendTokenToTheServer(token) {
	console.log('FIREBASE-REGISTER: sendSubscriptionToServer')
    console.log(token);
    return fetch('/api/firebaseToken/create.php', {
        method: 'POST',
				mode: 'same-origin',
				credentials: 'include',
				redirect: 'follow',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            fcmToken: token
        })
    });
}