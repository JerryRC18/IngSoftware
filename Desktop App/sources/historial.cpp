#include "historial.h"
#include "ui_historial.h"

Historial::Historial(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::Historial)
{
    ui->setupUi(this);

    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName("bd5s63srxd7fvmbw3cai-mysql.services.clever-cloud.com");
    db.setUserName("urcwxsqgdun2tukm");
    db.setPassword("8QDCaE22vYVXmlNxIjNn");
    db.setDatabaseName("bd5s63srxd7fvmbw3cai");
    ui->usu_id->addItem("Seleccione el usuario", 0);
    if(db.open()) {
        QSqlQuery query;
        if (query.exec("SELECT DISTINCT usu_nombre FROM usuarios ORDER BY usu_id")) {
            while (query.next()) {
                qDebug() << query.value(0);
                ui->usu_id->addItem(query.value(0).toString(), currentIndex);
            }
        }
        else {
            qDebug() << query.lastError().text();
        }
        currentIndex = 0;
        if (query.exec("SELECT DISTINCT serv_nombre FROM servicios")) {
            while (query.next()) {
                qDebug() << query.value(0);
                ui->serv->addItem(query.value(0).toString(), currentIndex);
                currentIndex += 1;
            }
        }
        else {
            qDebug() << query.lastError().text();
        }
    }
    else {
        qDebug() << "No connection";
    }
    currentIndex = 0;
}

Historial::~Historial()
{
    delete ui;
    db.close();
}

void Historial::on_accept_clicked()
{
        QString date = ui->date->date().toString(Qt::DateFormat::ISODate);
        QString time = ui->time->time().toString();
        int usu_id = ui->usu_id->currentIndex();  //currentIndex starts at 0
        QString serv = ui->serv->currentText();
        QString str = QString::number(usu_id);  //For some reason you need to send a String or else you get a syntax error
        qDebug() << "INSERT INTO citas (cit_fecha, cit_hora, cit_realizada, cit_id_usu, cit_servicio) VALUES ('" +date+ "', '" +time+ "', 0, " +str+ ", '" +serv+ "')";

        QSqlQuery query;
        if (query.exec("INSERT INTO citas (cit_fecha, cit_hora, cit_realizada, cit_id_usu, cit_servicio) VALUES ('" +date+ "', '" +time+ "',0, " +str+ ", '" +serv+ "')")) {
            qDebug() << "Success";
            QMessageBox::information(this, "Agendar cita", "Cita agendada correctamente", QMessageBox::StandardButton::Ok);
            this->close();
        }
        else {
        qDebug() << query.lastError().text();
    }
}
