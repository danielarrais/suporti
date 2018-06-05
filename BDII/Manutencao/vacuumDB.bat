echo "Iniciando manutenção no data base SUPORTI..."  
vacuumdb -v -d suporti -h localhost -p 5432 -U postgres
echo "Manutenção concluída com sucesso."
