#include "historial.h"
#include "ui_historial.h"

Historial::Historial(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::Historial)
{
    ui->setupUi(this);

    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName("127.0.0.1");
    db.setUserName("EduardoGC");
    db.setPassword("+BaalLordOfDestruction1");
    db.setDatabaseName("dentista");

}

Historial::~Historial()
{
    delete ui;
    db.close();
}

void Historial::on_accept_clicked()
{
        QString fecha = ui->fecha->text();
        QString hora = ui->hora->text();
        QString usu_id = ui->usu_id->text();
        QString serv = ui->serv->text();
        QSqlQuery query;
        if (query.exec("INSERT INTO citas (cit_fecha, cit_hora, cit_id_usu, cit_servicio) VALUES ('" +fecha+ "', '" +hora+ "', " +usu_id+", '" +serv+ "')")) {
            qDebug() << "Success";
        }
        else {
            qDebug() << query.lastError().text();
        }

}

