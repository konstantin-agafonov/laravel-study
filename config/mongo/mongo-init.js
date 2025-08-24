db.createUser(
        {
            user: "yii",
            pwd: "password",
            roles: [
                {
                    role: "readWrite",
                    db: "yii"
                }
            ]
        }
);