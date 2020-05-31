# コンテナを起動
.PHONY: start
start:
	docker-compose up -d 

# コンテナを起動 (コンソールにデバックを表示させる)
.PHONY: start-build
start-build:
	docker-compose up -d --build

# ログを表示
.PHONY: logs
logs:
	docker-compose logs

# 開発終了
.PHONY: kill
kill:
	docker-compose kill

# コンテナの状態を表示
.PHONY: ps
ps:
	docker-compose ps

# 全てのコンテナの状態を表示
.PHONY: ps-all
ps-all:
	docker ps -a

# mysqlのコンテナの中に入る
.PHONY: on-db
on-db:
	docker exec -it mysql57 bin/bash

# nodeのコンテナの中に入る
.PHONY: on-wp
on-wp:
	docker exec -i -t wp bash

# コンテナ、イメージを削除
.PHONY: clean
clean:
	@if [ "$(image)" != "" ] ; then \
			docker rmi -f $(image); \
	fi
	@if [ "$(contener)" != "" ] ; then \
			docker rm -f $(contener); \
	fi

# コンテナをリスタート
.PHONY: restart
restart: kill start-d
