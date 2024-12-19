const io = require('socket.io')(6001, {
    cors: {
        origin: '*',
        methods: ['GET', 'POST']
    }
});
const Redis = require('ioredis');
const redis = new Redis();

// Écoute des messages Redis
redis.subscribe('test-channel');
redis.on('message', (channel, message) => {
    console.log(`Message reçu sur ${channel}:`, message);
    message = JSON.parse(message);
    io.emit(channel, message.data);
});

// Écoute des connexions Socket.IO
io.on('connection', (socket) => {
    console.log(`Nouveau client connecté: ${socket.id}`);

    socket.on('disconnect', () => {
        console.log(`Client déconnecté: ${socket.id}`);
    });
});
