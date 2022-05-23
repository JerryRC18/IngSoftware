#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    historial = new Historial();

    db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName("127.0.0.1");
    db.setUserName("EduardoGC");
    db.setPassword("+BaalLordOfDestruction1");
    db.setDatabaseName("dentista");

    if (db.open()) {
        QSqlQuery query;
        if (query.exec("SELECT cit_id, cit_fecha, cit_hora, cit_servicio, usuarios.usu_nombre FROM citas JOIN usuarios ON cit_id_usu = usuarios.usu_id")) {
            while (query.next()) {
               qDebug() << query.value(0) << query.value(1) << query.value(2) << query.value(3) << query.value(4);
               QString id = query.value(0).toString();
               QString fecha = query.value(1).toString();
               QString hora = query.value(2).toString();
               QString serv =query.value(3).toString();
               QString usu_id = query.value(4).toString();

               ui->tableWidget->setRowCount(ui->tableWidget->rowCount() + 1);
               QTableWidgetItem* idItem = new QTableWidgetItem(id);
               QTableWidgetItem* fechaItem = new QTableWidgetItem(fecha);
               QTableWidgetItem* horaItem = new QTableWidgetItem(hora);
               QTableWidgetItem* servItem = new QTableWidgetItem(serv);
               QTableWidgetItem* usuItem = new QTableWidgetItem(usu_id);


               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 0, idItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 1, fechaItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 2, horaItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 3, servItem);
               ui->tableWidget->setItem(ui->tableWidget->rowCount() - 1, 4, usuItem);
            }
            hasInit = true;
        }
        else {
            qDebug() << query.lastError().text();
        }

    }
        else {
            qDebug() << "Failed to connect to database.";
    }


}

MainWindow::~MainWindow()
{
    db.close();
    delete ui;
}

void MainWindow::changeWindow()
{
    if(historial->isVisible())
    {
        historial->hide();
        this->show();
    }
    else
    {
        this->hide();
        historial->show();
    }
}


void MainWindow::on_pushButton_clicked()
{
    historial->show();
}

void MainWindow::on_tableWidget_itemDoubleClicked(QTableWidgetItem *item)
{
    if(hasInit) {
        QString id = ui->tableWidget->item(item->row(),0)->data(0).toString();
        QString fecha = ui->tableWidget->item(item->row(),1)->data(0).toString();
        QString hora = ui->tableWidget->item(item->row(),2)->data(0).toString();

        QSqlQuery query;
        if(query.exec("UPDATE citas SET cit_fecha = '" + fecha + "' ,cit_hora = '" + hora +"' WHERE cit_id = " + id)) {

        }
        else {
        qDebug() << query.lastError().text();
        }
    }
}

