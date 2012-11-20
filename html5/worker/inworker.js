
self.postMessage("Worker 1 Start");

self.onmessage = function (e) {
	handler(e);
}

function handler (e) {
	self.postMessage("Recieved: " + e.data);
}
